package es.malaga.diputacion.ae.help.modelos.services;

import java.util.List;
import java.util.Map;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

import es.malaga.diputacion.ae.help.filters.UsuariosPagination;
import es.malaga.diputacion.ae.help.modelos.entity.Usuario;

public interface IUsuarioService {

	public Usuario findByUsername(String username);

	public List<Usuario> findAll();

	public Usuario findById(Long id);

	public Page<Usuario> findPaginated(Pageable pageable);

	public Usuario save(Usuario usuario);

	public void delete(Long id);

	public List<Usuario> searchBy(String login);

	public Map<String, Object> findPaginated(UsuariosPagination filter);

}
