package es.malaga.diputacion.ae.help.controller;

import java.io.File;
import java.io.IOException;
import java.net.MalformedURLException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.UUID;
import java.util.stream.Collectors;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.io.Resource;
import org.springframework.core.io.UrlResource;
import org.springframework.dao.DataAccessException;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.multipart.MultipartFile;

import es.malaga.diputacion.ae.help.filters.UsuariosPagination;
import es.malaga.diputacion.ae.help.modelos.entity.Usuario;
import es.malaga.diputacion.ae.help.modelos.services.IUsuarioService;

@RestController
//@CrossOrigin(origins = { "*" })
@RequestMapping("/api")
public class UsuarioRestController extends CommonRestController {

	@Autowired
	private IUsuarioService usuarioService;
	
	@GetMapping("/usuarios")
	public ResponseEntity<?> index() {

		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();
		List<Usuario> usuarios = null;
		try {
			usuarios = usuarioService.findAll();

		} catch (DataAccessException dae) {
			response.put("mensaje", "Error en BBDD");
			response.put("error", dae.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

		}

		if (null == result) {
			response.put("mensaje", "Si se han encontrado usuarios.");
			response.put("content", usuarios);

			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

		}
		return result;

	}

	@GetMapping("/usuarios/{id}")
	public ResponseEntity<?> byId(@PathVariable Long id) {
		ResponseEntity<?> result = null;
		Map<String, Object> response = new HashMap<String, Object>();

		Usuario usuario = null;
		try {
			usuario = usuarioService.findById(id);

		} catch (DataAccessException dae) {
			response.put("mensaje", "Error en BBDD");
			response.put("error", dae.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

		}
		if (null == result) {
			if (null == usuario) {
				response.put("mensaje", "El usuario".concat(id.toString()).concat(" NO se ha encontrado."));
				response.put("error", "El usuario".concat(id.toString()).concat(" NO se ha encontrado."));
				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.NOT_FOUND);

			}
		}

		if (null == result) {
			response.put("mensaje", "El usuario".concat(id.toString()).concat(" se ha encontrado."));
			response.put("content", usuario);

			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

		}
		return result;

	}

	@GetMapping("/usuarios/page/{page}")
	public Page<Usuario> pageable(@PathVariable Integer page) {
		int sizePaginas = 4;
		Pageable pageable = PageRequest.of(page, sizePaginas);
		Page<Usuario> a = usuarioService.findPaginated(pageable);
		return usuarioService.findPaginated(pageable);

	}

	@GetMapping("/usuarios/pageBien/{page}")
	public ResponseEntity<?> pageableBien(@PathVariable Integer page) {

		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();
		Page<Usuario> usuarios = null;
		try {
			int size = 4;
			Pageable pageable = PageRequest.of(page, size);
			usuarios = usuarioService.findPaginated(pageable);

		} catch (DataAccessException dae) {
			response.put("mensaje", "Error en BBDD");
			response.put("error", dae.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

		}

		if (null == result) {
			response.put("mensaje", "Si se han encontrado usuarios.");
			response.put("content", usuarios.getContent());

			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

		}
		return result;

	}

	@GetMapping("/usuarios/pageMal/{page}")
	public ResponseEntity<?> pageableMal(@PathVariable Integer page) {

		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();
		Page<Usuario> usuarios = null;
		try {
			int size = 4;
			Pageable pageable = PageRequest.of(page, size);
			usuarios = usuarioService.findPaginated(pageable);

		} catch (DataAccessException dae) {
			response.put("mensaje", "Error en BBDD");
			response.put("error", dae.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

		}

		if (null == result) {
			response.put("mensaje", "Si se han encontrado usuarios.");
			response.put("content", usuarios);

			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

		}
		return result;

	}

	@PostMapping("/usuarios")
	public ResponseEntity<?> create(@Valid @RequestBody Usuario usuario, BindingResult result) {

		ResponseEntity<?> respuesta = null;

		Usuario newUsuario = null;
		Map<String, Object> response = new HashMap<String, Object>();

		if (result.hasErrors()) {
			List<String> errors = result.getFieldErrors().stream()
					.map(err -> "El campo " + err.getField() + "" + err.getDefaultMessage())
					.collect(Collectors.toList());
			response.put("errors", errors);
			respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.BAD_REQUEST);
		}

		if (null == respuesta) {
			try {
				newUsuario = usuarioService.save(usuario);

			} catch (DataAccessException dae) {
				response.put("mensaje", "Error al insertar en BBDD");
				response.put("error", dae.getMessage());
				respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

			}

		}

		if (null == respuesta) {
			response.put("mensaje", "Usuario creado con exito.");
			response.put("content", newUsuario);

			respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);
		}

		return respuesta;
	}

	@PutMapping("/usuarios/{id}")
	public ResponseEntity<?> update(@Valid @RequestBody Usuario usuario, BindingResult result, @PathVariable Long id) {

		ResponseEntity<?> respuesta = null;

		Usuario usuarioActual = usuarioService.findById(id);

		Usuario updatedUsuario = null;
		Map<String, Object> response = new HashMap<String, Object>();

		if (result.hasErrors()) {
			List<String> errors = result.getFieldErrors().stream()
					.map(err -> "El campo " + err.getField() + "" + err.getDefaultMessage())
					.collect(Collectors.toList());
			response.put("errors", errors);
			respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.BAD_REQUEST);
		}

		if (null == respuesta) {
			if (null == usuarioActual) {
				response.put("mensaje", "El usuario".concat(id.toString()).concat(" NO se ha encontrado."));
				response.put("error", "El usuario".concat(id.toString()).concat(" NO se ha encontrado."));
				respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.NOT_FOUND);

			}

		}

		if (null == respuesta) {
			try {

				usuarioActual.setLogin(usuario.getLogin());
				usuarioActual.setPass(usuario.getPass());
				usuarioActual.setRole(usuario.getRole());

				updatedUsuario = usuarioService.save(usuarioActual);

			} catch (DataAccessException dae) {
				response.put("mensaje", "Error al actualizar en BBDD");
				response.put("error", dae.getMessage());
				respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);
			}
		}

		if (null == respuesta) {
			response.put("mensaje", "Usuario actualizado con exito.");
			response.put("content", updatedUsuario);

			respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);
		}

		return respuesta;
	}

	@DeleteMapping("/usuarios/{id}")
	public ResponseEntity<?> delete(@PathVariable Long id) {
		ResponseEntity<?> result = null;
		Map<String, Object> response = new HashMap<String, Object>();

		try {
			usuarioService.delete(id);

		} catch (DataAccessException dae) {
			response.put("mensaje", "Error al eliminar en BBDD");
			response.put("error", dae.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

		}

		if (null == result) {
			response.put("mensaje", "El usuario ha sido eliminado.");
			response.put("content", "OK");

			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);
		}

		return result;

	}

	@GetMapping("/usuariosByLog/{login}")
	public ResponseEntity<?> byId(@PathVariable String login) {
		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();
		List<Usuario> usuarios = null;
		try {
			usuarios = usuarioService.searchBy(login);

		} catch (DataAccessException dae) {
			response.put("mensaje", "Error en BBDD");
			response.put("error", dae.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

		}

		if (null == result) {
			response.put("mensaje", "Si se han encontrado usuarios.");
			response.put("content", usuarios);

			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

		}
		return result;

	}

	@PostMapping("/usuarios/upload")
	public ResponseEntity<?> upload(@RequestParam("archivo") MultipartFile archivo, @RequestParam("id") Long id) {

		ResponseEntity<?> respuesta = null;

		Usuario usuarioActual = usuarioService.findById(id);

		Usuario updatedUsuario = null;
		Map<String, Object> response = new HashMap<String, Object>();

		if (!archivo.isEmpty()) {
			String nombreArchivo = UUID.randomUUID().toString() + "_" + archivo.getOriginalFilename().replace(" ", "");
			Path rutaArchivo = Paths.get("uploads").resolve(nombreArchivo).toAbsolutePath();
			// Log.info(rutaArchivo.toString());
			try {
				Files.copy(archivo.getInputStream(), rutaArchivo);
			} catch (IOException ioe) {
				response.put("mensaje", "Error al subir " + nombreArchivo);
				response.put("error", ioe.getMessage());
				respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);
			}
		}

		String nombreFotoAnterior = "";// cliente.getFoto();

		if (null != nombreFotoAnterior && nombreFotoAnterior.length() > 0) {
			Path rutaFotoAnterior = Paths.get("uploads").resolve(nombreFotoAnterior).toAbsolutePath();
			File archivoFotoAnterior = rutaFotoAnterior.toFile();
			if (archivoFotoAnterior.exists() && archivoFotoAnterior.canRead()) {
				archivoFotoAnterior.delete();
			}
		}

		// cliente.setFoto(nombreArchivo);
		// cliente.save(cliente)

		if (null == respuesta) {
			response.put("mensaje", "Imagen subida con exito.");
			response.put("content", updatedUsuario);

			respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.CREATED);
		}

		return respuesta;
	}

	@GetMapping("/uploads/img/{nombreFoto:.+}")
	public ResponseEntity<?> verFoto(@PathVariable("archivo") String nombreFoto) {

		ResponseEntity<?> respuesta = null;

		Path rutaArchivo = Paths.get("uploads").resolve(nombreFoto).toAbsolutePath();

		Resource recurso = null;

		try {
			recurso = new UrlResource(rutaArchivo.toUri());
		} catch (MalformedURLException e) {
			// e.print
		}

		if (!recurso.exists() && !recurso.isReadable()) {
			throw new RuntimeException("No se puede cargar la imagen");
		}

		Map<String, Object> response = new HashMap<String, Object>();

		HttpHeaders cabecera = new HttpHeaders();
		cabecera.add(HttpHeaders.CONTENT_DISPOSITION, "attachment; filename=\"" + recurso.getFilename() + "\"");

		respuesta = new ResponseEntity<Resource>(recurso, cabecera, HttpStatus.OK);

		return respuesta;
	}

	/*
	@PostMapping("/usuariosPaginados")
	public ResponseEntity<?> create(@Valid @RequestBody PaginationVO usuario, BindingResult result) {

		ResponseEntity<?> respuesta = null;

		Map<String, Object> response = new HashMap<String, Object>();

		if (result.hasErrors()) {
			List<String> errors = result.getFieldErrors().stream()
					.map(err -> "El campo " + err.getField() + "" + err.getDefaultMessage())
					.collect(Collectors.toList());
			response.put("errors", errors);
			respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.BAD_REQUEST);
		}

		if (null == respuesta) {
			try {
				response = paginationService.searchByCriteria(usuario);
			} catch (DataAccessException dae) {
				response.put("mensaje", "Error al insertar en BBDD");
				response.put("error", dae.getMessage());
				respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

			}

		}

		if (null == respuesta) {
			response.put("mensaje", "Listado de Usuarios paginados.");
			// response.put("content", response);

			respuesta = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);
		}

		return respuesta;
	}
*/
	@PostMapping("/paged")
	public ResponseEntity<?> create(@Valid @RequestBody UsuariosPagination filter, BindingResult bind) {

		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();

		if (bind.hasErrors()) {
			List<String> errors = bind.getFieldErrors().stream()
					.map(err -> "El campo " + err.getField() + "" + err.getDefaultMessage())
					.collect(Collectors.toList());
			response.put("errors", errors);
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.BAD_REQUEST);
		} else {
			try {
				System.out.println("--->" + filter);
				response = usuarioService.findPaginated(filter);
				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

			} catch (DataAccessException dae) {
				result = errorHandler(dae);
			}

		}

		return result;
	}

}
