package es.malaga.diputacion.ae.help.ad;

import java.util.Map;

import es.malaga.diputacion.ae.help.filters.UsuariosPagination;
import es.malaga.diputacion.ae.help.modelos.entity.Usuario;

public interface IUsuariosFullDao {

	public Map<String, Object> getUsuarios(Usuario usu);

	public Map<String, Object> searchByCriteria(UsuariosPagination filter);

}
