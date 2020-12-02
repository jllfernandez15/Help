package es.malaga.diputacion.ae.help.controller;

import java.security.Principal;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataAccessException;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import es.malaga.diputacion.ae.help.filters.VehiculosPagination;
import es.malaga.diputacion.ae.help.modelos.entity.Vehiculo;
import es.malaga.diputacion.ae.help.modelos.services.IVehiculosService;

@RestController
@RequestMapping("/vehiculos")
public class VehiculoRestController extends CommonRestController {

	@Autowired
	private IVehiculosService vehiculosService;

	@GetMapping("/all")
	public ResponseEntity<?> index() {

		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();
		List<Vehiculo> vehiculos = null;
		try {
			vehiculos = vehiculosService.findAll();
			response.put("mensaje", "Si se han encontrado vehiculos.");
			response.put("content", vehiculos);

			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

		} catch (DataAccessException dae) {
			result = errorHandler(dae);
		}

		return result;

	}

	@GetMapping("/{id}")
	public ResponseEntity<?> byId(@PathVariable Long id) {
		ResponseEntity<?> result = null;
		Map<String, Object> response = new HashMap<String, Object>();

		Vehiculo vehiculos = null;
		try {
			vehiculos = vehiculosService.findById(id);
			if (null == vehiculos) {
				response.put("mensaje", "El vehiculo".concat(id.toString()).concat(" NO se ha encontrado."));
				response.put("error", "El vehiculo".concat(id.toString()).concat(" NO se ha encontrado."));
				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.NOT_FOUND);

			} else {
				response.put("mensaje", "El vehiculo".concat(id.toString()).concat(" se ha encontrado."));
				response.put("content", vehiculos);

				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

			}

		} catch (DataAccessException dae) {
			result = errorHandler(dae);
		}
		return result;

	}

	@PostMapping("")
	public ResponseEntity<?> create(@Valid @RequestBody Vehiculo vehiculo, BindingResult bind) {

		ResponseEntity<?> result = null;

		Vehiculo newVehiculo = null;
		Map<String, Object> response = new HashMap<String, Object>();

		if (bind.hasErrors()) {
			List<String> errors = bind.getFieldErrors().stream()
					.map(err -> "El campo " + err.getField() + "" + err.getDefaultMessage())
					.collect(Collectors.toList());
			response.put("errors", errors);
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.BAD_REQUEST);
		} else {

			try {

				newVehiculo = vehiculosService.save(vehiculo);
				response.put("mensaje", "Vehiculo creado con exito.");
				response.put("content", newVehiculo);

				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

			} catch (DataAccessException dae) {
				result = errorHandler(dae);
			}

		}

		return result;
	}

	@PutMapping("")
	public ResponseEntity<?> update(@Valid @RequestBody Vehiculo vehiculo, BindingResult bind) {

		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();

		if (bind.hasErrors()) {
			List<String> errors = bind.getFieldErrors().stream()
					.map(err -> "El campo " + err.getField() + "" + err.getDefaultMessage())
					.collect(Collectors.toList());
			response.put("errors", errors);
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.BAD_REQUEST);
		} else {

			Long id = vehiculo.getId();
			Vehiculo previousVehiculo = vehiculosService.findById(id);

			if (null == previousVehiculo) {
				response.put("mensaje", "El Vehiculo".concat(id.toString()).concat(" NO se ha encontrado."));
				response.put("error", "El Vehiculo".concat(id.toString()).concat(" NO se ha encontrado."));
				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.NOT_FOUND);
				// respuesta = errorHandler(dae);
			} else {
				try {
					previousVehiculo.setCode(vehiculo.getCode());
					previousVehiculo.setNombre(vehiculo.getNombre());

					Vehiculo updateVehiculo = vehiculosService.save(previousVehiculo);
					response.put("mensaje", "Vehiculo actualizado con exito.");
					response.put("content", updateVehiculo);

					result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

				} catch (DataAccessException dae) {
					result = errorHandler(dae);
				}

			}

		}

		return result;
	}

	@DeleteMapping("/{id}")
	public ResponseEntity<?> delete(@PathVariable Long id) {
		ResponseEntity<?> result = null;
		Map<String, Object> response = new HashMap<String, Object>();

		Vehiculo vehiculoActual = vehiculosService.findById(id);

		if (null == vehiculoActual) {
			response.put("mensaje", "El vehiculo ".concat(id.toString()).concat(" NO se ha encontrado."));
			response.put("error", "El vehiculo ".concat(id.toString()).concat(" NO se ha encontrado."));
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.NOT_FOUND);

		} else {
			try {
				vehiculosService.delete(id);
				response.put("mensaje", "El Vehiculo ha sido eliminado.");
				response.put("content", "OK");

				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

			} catch (DataAccessException dae) {
				result = errorHandler(dae);
			}

		}

		return result;

	}

	@PostMapping("/paged")
	public ResponseEntity<?> create(@Valid @RequestBody VehiculosPagination filter, BindingResult bind,
			Principal user) {

		ResponseEntity<?> result = null;
		// Usuario usuario = usuarioService.findByUsername(user.getName());

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
				response = vehiculosService.findPaginated(filter);
				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

			} catch (DataAccessException dae) {
				result = errorHandler(dae);
			}

		}

		return result;
	}

	@PostMapping("/search")
	public ResponseEntity<?> search(@Valid @RequestBody Vehiculo vehiculo, BindingResult bind) {

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
				response = vehiculosService.getVehiculos(vehiculo);
				result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

			} catch (DataAccessException dae) {
				result = errorHandler(dae);
			}

		}

		return result;
	}

	@GetMapping("/vehiculosByCode/{code}")
	public ResponseEntity<?> byId(@PathVariable String code) {
		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();
		List<Vehiculo> vehiculos = null;

		try {
			vehiculos = vehiculosService.searchBy(code);

		} catch (DataAccessException dae) {
			response.put("mensaje", "Error en BBDD");
			response.put("error", dae.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

		}

		if (null == result) {
			response.put("mensaje", "Si se han encontrado vehiculos.");
			response.put("content", vehiculos);

			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

		}
		return result;

	}

	@GetMapping("/vehiculosWithCode/{code}")
	public ResponseEntity<?> withCode(@PathVariable String code) {
		ResponseEntity<?> result = null;

		Map<String, Object> response = null;// new HashMap<String, Object>();

		try {
			Vehiculo vehiculo = new Vehiculo();
			vehiculo.setCode(code);

			response = vehiculosService.getVehiculos(vehiculo);
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);

		} catch (DataAccessException dae) {
			result = errorHandler(dae);
		}

		return result;

	}

}
