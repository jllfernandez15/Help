package es.malaga.diputacion.ae.help.modelos.dao;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.springframework.data.repository.query.Param;

import es.malaga.diputacion.ae.help.modelos.entity.Usuario;

public interface IUsuarioDao extends CrudRepository<Usuario, Long> {

	/*@Query("SELECT usuario_ from Master.usuarios usuario_ " + " LEFT JOIN FETCH usuario_.role role_ "
			+ "WHERE usuario_.login = :login")
	*/
	
	@Query("select u from Usuario u where u.login= :login")
	public List<Usuario> searchBy(@Param("login") String login);

}
