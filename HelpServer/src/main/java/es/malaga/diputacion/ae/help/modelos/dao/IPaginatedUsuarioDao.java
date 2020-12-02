package es.malaga.diputacion.ae.help.modelos.dao;

import org.springframework.data.jpa.repository.JpaRepository;

import es.malaga.diputacion.ae.help.modelos.entity.Usuario;

public interface IPaginatedUsuarioDao extends JpaRepository<Usuario, Long> {

}
