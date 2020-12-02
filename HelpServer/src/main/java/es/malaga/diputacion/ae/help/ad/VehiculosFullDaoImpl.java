package es.malaga.diputacion.ae.help.ad;

import java.util.HashMap;
import java.util.Map;

import org.springframework.stereotype.Service;

import es.malaga.diputacion.ae.help.ad.utils.Operators;
import es.malaga.diputacion.ae.help.filters.VehiculosPagination;
import es.malaga.diputacion.ae.help.modelos.entity.Vehiculo;

@Service
public class VehiculosFullDaoImpl extends SqlHandlerDao implements IVehiculosFullDao {

	public Map<String, Object> getVehiculos(Vehiculo veh) {

		String sqlQuery = "select v from Vehiculo v " + " LEFT JOIN v.componente comp " + " LEFT JOIN comp.pieza piez "
		 + " where v.code = :param1"
		 + " and v.nombre = :param2";

		Map<String, Object> parametersMap = new HashMap<String, Object>();
		//parametersMap.put("param1", veh.getComponente().getPieza().getCode());
		parametersMap.put("param1", veh.getCode());
		parametersMap.put("param2", veh.getNombre());

		return super.executeQuery(sqlQuery, parametersMap);
	}

	public Map<String, Object> searchByCriteria(VehiculosPagination filter) {

		String sqlQuery = "select v from Vehiculo v " + " LEFT JOIN v.componente comp  ";

		Map<String, String> translate = new HashMap<String, String>();
		translate.put("Code", "v.code");

		Map<String, Object> parametersMap = new HashMap<String, Object>();
		parametersMap.put("v.code", filter.getVehiculo().getCode());
		parametersMap.put("v.nombre", filter.getVehiculo().getNombre());

		Map<String, Object> operatorsMap = new HashMap<String, Object>();
		operatorsMap.put("v.nombre", Operators.LIKE);

		Map<String, Object> result = super.searchByCriteria(sqlQuery, filter.getPaged(), parametersMap, operatorsMap,
				translate);

		return result;
	}
}
