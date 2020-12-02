package es.malaga.diputacion.ae.help.modelos.services;

import java.util.List;
import java.util.stream.Collectors;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import es.malaga.diputacion.ae.help.modelos.dao.IUsuarioDao;
import es.malaga.diputacion.ae.help.modelos.entity.Usuario;

@Service
public class AuthenticationService implements UserDetailsService, IAuthenticationService {

	private Logger logger = LoggerFactory.getLogger(AuthenticationService.class);

	@Autowired
	private IUsuarioDao usuarioDao;

	@Autowired
	private BCryptPasswordEncoder passwordEncoder;

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

}
