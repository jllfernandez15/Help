package es.malaga.diputacion.ae.help.modelos.dao;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.springframework.data.repository.query.Param;

import es.malaga.diputacion.ae.help.modelos.entity.Vehiculo;

public interface IVehiculoDao extends CrudRepository<Vehiculo, Long> {

	@Query("select v from Vehiculo v where v.code= :code")
	public List<Vehiculo> searchBy(@Param("code") String code);

}
