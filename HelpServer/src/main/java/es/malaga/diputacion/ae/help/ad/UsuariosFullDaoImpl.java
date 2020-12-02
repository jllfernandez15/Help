package es.malaga.diputacion.ae.help.ad;

import java.util.HashMap;
import java.util.Map;

import org.springframework.stereotype.Service;

import es.malaga.diputacion.ae.help.filters.UsuariosPagination;
import es.malaga.diputacion.ae.help.modelos.entity.Usuario;

@Service
public class UsuariosFullDaoImpl extends SqlHandlerDao implements IUsuariosFullDao {

	public Map<String, Object> getUsuarios(Usuario usu) {

		String sqlQuery = "sselect u from Usuario u " + " LEFT JOIN u.role role ";

		Map<String, Object> parametersMap = new HashMap<String, Object>();
		// parametersMap.put("param1", veh.getComponente().getPieza().getCode());

		return super.executeQuery(sqlQuery, parametersMap);
	}

	public Map<String, Object> searchByCriteria(UsuariosPagination filter) {

		String sqlQuery = "select u from Usuario u " + " LEFT JOIN u.role role  ";

		Map<String, String> translate = new HashMap<String, String>();
		translate.put("Code", "v.code");

		Map<String, Object> parametersMap = new HashMap<String, Object>();
		// parametersMap.put("usu.login", filter.getLogin());
		// parametersMap.put("usu.pass", filter.getPass());
		// parametersMap.put("rol.id", filter.getRoleId());
		// parametersMap.put("usu.birth_date", filter.getDates());

		Map<String, Object> operatorsMap = new HashMap<String, Object>();
		// operatorsMap.put("usu.login", Operators.LIKE);
		// operatorsMap.put("usu.pass", Operators.EQUAL);
		// operatorsMap.put("usu.birth_date", Operators.BETWEEN);

		Map<String, Object> result = super.searchByCriteria(sqlQuery, filter.getPaged(), parametersMap, operatorsMap,
				translate);

		return result;
	}
}
