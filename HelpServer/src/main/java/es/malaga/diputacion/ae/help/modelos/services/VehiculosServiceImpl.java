package es.malaga.diputacion.ae.help.modelos.services;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import es.malaga.diputacion.ae.help.ad.IVehiculosFullDao;
import es.malaga.diputacion.ae.help.filters.VehiculosPagination;
import es.malaga.diputacion.ae.help.modelos.dao.IVehiculoDao;
import es.malaga.diputacion.ae.help.modelos.entity.Vehiculo;

@Service
public class VehiculosServiceImpl implements IVehiculosService {

	@Autowired
	private IVehiculoDao vehiculosDao;

	@Autowired
	private IVehiculosFullDao vehiculosFullDao;

	public Map<String, Object> getVehiculos(Vehiculo veh) {
		return vehiculosFullDao.getVehiculos(veh);
	}

	@Override
	@Transactional // (readOnly = true)
	public List<Vehiculo> findAll() {
		return (List<Vehiculo>) vehiculosDao.findAll();
	}

	@Override
	@Transactional // (readOnly = true)
	public Vehiculo findById(Long id) {
		return vehiculosDao.findById(id).orElse(null);
	}

	@Override
	@Transactional // (readOnly = true)
	public Map<String, Object> findPaginated(VehiculosPagination filter) {
		return vehiculosFullDao.searchByCriteria(filter);
	}

	/*
	 * @Override
	 * 
	 * @Transactional // (readOnly = true) public Page<Usuario>
	 * findPaginated(Pageable pageable) { return
	 * paginatedUsuarioDao.findAll(pageable); }
	 */
	@Override
	public List<Vehiculo> searchBy(String code) {
		return (List<Vehiculo>) vehiculosDao.searchBy(code);
	}

	@Override
	public Map<String, Object> search(Vehiculo vehiculo) {
		return (Map<String, Object>) vehiculosFullDao.getVehiculos(vehiculo);
	}

	@Override
	@Transactional // (readOnly = true)
	public Vehiculo save(Vehiculo usuario) {
		return vehiculosDao.save(usuario);
	}

	@Override
	@Transactional // (readOnly = true)
	public void delete(Long id) {
		vehiculosDao.deleteById(id);
	}

}
