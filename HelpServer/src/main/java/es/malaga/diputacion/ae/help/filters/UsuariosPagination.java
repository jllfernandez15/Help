package es.malaga.diputacion.ae.help.filters;

import es.malaga.diputacion.ae.help.modelos.entity.Usuario;

public class UsuariosPagination {


	private Paged paged;

	private Usuario usuario;

	public Paged getPaged() {
		return paged;
	}

	public void setPaged(Paged paged) {
		this.paged = paged;
	}

	public Usuario getUsuario() {
		return usuario;
	}

	public void setUsuario(Usuario usuario) {
		this.usuario = usuario;
	}}
