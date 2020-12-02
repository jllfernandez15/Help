package es.malaga.diputacion.ae.help.ad;

import java.util.Map;

import es.malaga.diputacion.ae.help.filters.VehiculosPagination;
import es.malaga.diputacion.ae.help.modelos.entity.Vehiculo;

public interface IVehiculosFullDao {

	public Map<String, Object> getVehiculos(Vehiculo veh);

	public Map<String, Object> searchByCriteria(VehiculosPagination filter);

}
