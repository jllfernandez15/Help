package es.malaga.diputacion.ae.help.modelos.services;

import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import es.malaga.diputacion.ae.help.ad.IUsuariosFullDao;
import es.malaga.diputacion.ae.help.filters.UsuariosPagination;
import es.malaga.diputacion.ae.help.modelos.dao.IPaginatedUsuarioDao;
import es.malaga.diputacion.ae.help.modelos.dao.IUsuarioDao;
import es.malaga.diputacion.ae.help.modelos.entity.Usuario;

@Service
public class UsuarioService implements IUsuarioService, UserDetailsService {

	private Logger logger = LoggerFactory.getLogger(UsuarioService.class);

	@Autowired
	private IUsuarioDao usuarioDao;

	@Autowired
	private IUsuariosFullDao usuariosFullDao;

	@Autowired
	private BCryptPasswordEncoder passwordEncoder;

	@Autowired
	private IPaginatedUsuarioDao paginatedUsuarioDao;

	@Override
	@Transactional(readOnly = true)
	public UserDetails loadUserByUsername(String login) throws UsernameNotFoundException {

		List<Usuario> usuarios = usuarioDao.searchBy(login);
		Usuario usuario = usuarios.get(0);
		if (usuario == null) {
			logger.error("Error en el login: no existe el usuario '" + login + "' en el sistema!");
			throw new UsernameNotFoundException(
					"Error en el login: no existe el usuario '" + login + "' en el sistema!");
		}

		List<GrantedAuthority> authorities = usuario.getRole().getCapabilitys().stream()
				.map(role -> new SimpleGrantedAuthority(role.getCode()))
				.peek(authority -> logger.info("Role: " + authority.getAuthority())).collect(Collectors.toList());

		return new User(usuario.getLogin(), passwordEncoder.encode(usuario.getPass()), /* usuario.getEnabled() */true,
				true, true, true, authorities);
	}

	@Override
	@Transactional // (readOnly = true)
	public Page<Usuario> findPaginated(Pageable pageable) {
		return paginatedUsuarioDao.findAll(pageable);
	}

	@Override
	@Transactional(readOnly = true)
	public Usuario findByUsername(String username) {
		List<Usuario> l = usuarioDao.searchBy(username);
		return l.get(0);
	}

	@Override
	@Transactional // (readOnly = true)
	public List<Usuario> findAll() {
		return (List<Usuario>) usuarioDao.findAll();
	}

	@Override
	@Transactional // (readOnly = true)
	public Usuario findById(Long id) {
		return usuarioDao.findById(id).orElse(null);
	}

	@Override
	public List<Usuario> searchBy(String usuariocode) {
		return (List<Usuario>) usuarioDao.searchBy(usuariocode);
	}

	@Override
	@Transactional // (readOnly = true)
	public Usuario save(Usuario usuario) {
		return usuarioDao.save(usuario);
	}

	@Override
	@Transactional // (readOnly = true)
	public void delete(Long id) {
		usuarioDao.deleteById(id);
	}

	@Override
	@Transactional // (readOnly = true)
	public Map<String, Object> findPaginated(UsuariosPagination filter) {
		return usuariosFullDao.searchByCriteria(filter);
	}

}