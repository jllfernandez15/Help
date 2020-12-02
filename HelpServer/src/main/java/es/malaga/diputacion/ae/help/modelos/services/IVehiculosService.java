package es.malaga.diputacion.ae.help.modelos.services;

import java.util.List;
import java.util.Map;

import es.malaga.diputacion.ae.help.filters.VehiculosPagination;
import es.malaga.diputacion.ae.help.modelos.entity.Vehiculo;

public interface IVehiculosService {

	public Map<String, Object> getVehiculos(Vehiculo veh);

	public List<Vehiculo> findAll();

	public Vehiculo findById(Long id);

	public Map<String, Object> findPaginated(VehiculosPagination filter);

	public Vehiculo save(Vehiculo usuario);

	public void delete(Long id);

	public List<Vehiculo> searchBy(String code);

	public Map<String, Object> search(Vehiculo vehiculo);

}
