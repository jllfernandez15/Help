package es.malaga.diputacion.ae.help.ad;

import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.persistence.Query;

import es.malaga.diputacion.ae.help.ad.utils.Operators;
import es.malaga.diputacion.ae.help.filters.Paged;

public class SqlHandlerDao {

	@PersistenceContext
	private EntityManager entityManager;

	/**
	 * executeQuery.
	 * 
	 * @param sqlQuery
	 * @param parametersMap
	 * @return Map<String, Object>
	 */
	protected Map<String, Object> executeQuery(String sqlQuery, Map<String, Object> parametersMap) {

		Map<String, Object> result = new HashMap<String, Object>();

		ArrayList<Object> content = new ArrayList<Object>();

		final Query query = this.entityManager.createQuery(sqlQuery);

		if (parametersMap != null) {
			for (Map.Entry<String, Object> entry : parametersMap.entrySet()) {
				query.setParameter(entry.getKey(), entry.getValue());
			}

		}

		List<?> listado = (List<?>) query.getResultList();

		if (null != listado) {
			for (Object entity : listado) {
				content.add(entity);
			}
		}

		result.put("content", content);

		return result;
	}

	/**
	 * searchByCriteria.
	 * 
	 * @param sqlQuery
	 * @param parametersMap
	 * @param operatorsMap
	 * @return Map<String, Object>
	 */
	protected Map<String, Object> searchByCriteria(String sqlQuery, Map<String, Object> parametersMap,
			Map<String, Object> operatorsMap) {
		return this.searchByCriteria(sqlQuery, null, parametersMap, operatorsMap, null);
	}

	/**
	 * searchByCriteria.
	 * 
	 * @param sqlQuery
	 * @param paged
	 * @param parametersMap
	 * @param operatorsMap
	 * @return Map<String, Object>
	 */
	protected Map<String, Object> searchByCriteria(String sqlQuery, Paged paged, Map<String, Object> parametersMap,
			Map<String, Object> operatorsMap) {
		return this.searchByCriteria(sqlQuery, paged, parametersMap, operatorsMap, null);
	}

	//
	/**
	 * searchByCriteria.
	 * 
	 * @param sqlQuery
	 * @param paged
	 * @param parametersMap
	 * @param operatorsMap
	 * @param translate
	 * @return Map<String, Object>
	 */
	protected Map<String, Object> searchByCriteria(String sqlQuery, Paged paged, Map<String, Object> parametersMap,
			Map<String, Object> operatorsMap, Map<String, String> translate) {

		Map<String, Object> result = new HashMap<String, Object>();

		ArrayList<Object> content = new ArrayList<Object>();

		String finalSql = sqlQuery.concat(" where 1=1 ");
		ArrayList<Object> params = new ArrayList<Object>();
		ArrayList<Object> paramsDates = new ArrayList<Object>();
		int cont = 0;
		int contDates = 0;

		if (parametersMap != null) {
			String operation = null;
			for (Map.Entry<String, Object> entry : parametersMap.entrySet()) {

				if (isNotEmpty(entry.getValue())) {
					// if (null != entry.getValue()) {
					operation = getOperation(operatorsMap, entry.getKey());
					if (operation.equals(Operators.LIKE)) {

						finalSql += " AND UPPER (".concat(entry.getKey()).concat(") ").concat(operation)
								.concat(" : param").concat(String.valueOf(cont));
						params.add(prepareToLike(entry.getValue().toString().toUpperCase()));
						cont++;
					}

					else if (operation.equals(Operators.BETWEEN)) {
						finalSql += " AND ".concat(entry.getKey()).concat(" ").concat(operation).concat(" :paramInf")
								.concat(String.valueOf(contDates));
						paramsDates.add(((Date[]) entry.getValue())[0]);

						finalSql += " AND ".concat(":paramSup").concat(String.valueOf(contDates));
						paramsDates.add(((Date[]) entry.getValue())[1]);
						contDates++;

					} else {

						finalSql += " AND ".concat(entry.getKey()).concat(operation).concat(" :").concat("param")
								.concat(String.valueOf(cont));
						params.add(entry.getValue());
						cont++;
					}

				}
			}

		}

		Query query = null;
		Long total = null;

		if (null == paged) {
			query = this.entityManager.createQuery(finalSql);

		} else {
			String orderedFinalSql = finalSql.concat(" ORDER BY ")
					.concat(getTranslate(translate, paged.getOrderField())).concat(" ").concat(paged.getOrderType());
			query = this.entityManager.createQuery(orderedFinalSql);

			// -> Contar
			final String countSql = "SELECT count(*) from ".concat(finalSql.split("from")[1]);
			final Query queryContar = this.entityManager.createQuery(countSql);

			cont = 0;
			for (Object obj : params) {
				queryContar.setParameter("param".concat(String.valueOf(cont)), obj);
				query.setParameter("param".concat(String.valueOf(cont)), obj);
				cont++;
			}

			contDates = 0;
			for (int pos = 0; pos < paramsDates.size(); pos++) {
				queryContar.setParameter("paramInf".concat(String.valueOf(contDates)), paramsDates.get(pos));
				query.setParameter("paramInf".concat(String.valueOf(contDates)), paramsDates.get(pos));
				pos++;
				queryContar.setParameter("paramSup".concat(String.valueOf(contDates)), paramsDates.get(pos));
				query.setParameter("paramSup".concat(String.valueOf(contDates)), paramsDates.get(pos));

				contDates++;
			}

			total = (Long) queryContar.getSingleResult();

			// -> Paginacion
			if (paged.getPageSize() > 0) {
				query.setFirstResult((paged.getPage()) * paged.getPageSize());
				query.setMaxResults(paged.getPageSize());
			}
		}

		List<?> listado = (List<?>) query.getResultList();

		if (null != listado) {
			for (Object entity : listado) {
				content.add(entity);
			}
		}

		if (null != paged) {
			result.put("total", total);
			result.put("page", paged.getPage());
			result.put("pageSize", paged.getPageSize());

			int totalPages = (int) (total / paged.getPageSize());

			if (total % paged.getPageSize() > 0) {
				totalPages++;
			}

			result.put("totalPages", totalPages);
		}

		result.put("content", content);

		return result;

	}

	/**
	 * getTranslate.
	 * 
	 * @param translate
	 * @param key
	 * @return
	 */
	private String getTranslate(Map<String, String> translate, String key) {
		if (null == translate) {
			translate = new HashMap<String, String>();
		}

		String result = translate.get(key);

		if (null == result) {
			result = key;
		}
		return result;
	}

	/**
	 * prepareToLike.
	 * 
	 * @param like String
	 * @return String
	 */
	private String prepareToLike(String like) {
		return "%" + like + "%";
	}

	/**
	 * getOperation.
	 * 
	 * @param operations
	 * @param key
	 * @return
	 */
	private String getOperation(Map operations, String key) {
		// System.out.println("CLAVE Original--->" + key);
		String operation = Operators.EQUAL;
		if (operations != null) {
			if (null != operations.get(key))
				operation = (String) operations.get(key);
		}
		return operation;
	}

	/**
	 * isNotEmpty.
	 * 
	 * @param obj
	 * @return
	 */
	private boolean isNotEmpty(Object obj) {
		boolean result = (obj != null);

		if (result) {
			if (obj instanceof String) {
				result = !((String) obj).isEmpty();
			}
		}
		return result;
	}

}
