package es.malaga.diputacion.ae.help.controller;

import java.util.HashMap;
import java.util.Map;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@CrossOrigin(origins = { "*" })

@RequestMapping("/api")
public class ClienteRestController {

	// @Autowired
	// private IPaginationService paginationService;

	// @Autowired
	// private IVehiculosService vehiculosService;

	@GetMapping("/paginacion")
	public ResponseEntity<?> index() {
		// @Valid @RequestBody PaginationVO vo

		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();

		if (null == result) {
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);
		}
		return result;

	}

	@GetMapping("/vehiculos")
	public ResponseEntity<?> vehiculos() {

		ResponseEntity<?> result = null;

		Map<String, Object> response = new HashMap<String, Object>();
		/*
		 * try { Vehiculo vehiculo = new Vehiculo(); String code = "VEHICULO1"; //
		 * vehiculo.setCode(code); Componente comp = new Componente(); Pieza pieza = new
		 * Pieza(); pieza.setCode("PIEZA1"); comp.setPieza(pieza);
		 * vehiculo.setComponente(comp);
		 * 
		 * response = vehiculosService.getVehiculos(vehiculo);
		 * 
		 * } catch (DataAccessException dae) { response.put("mensaje", "Error en BBDD");
		 * response.put("error", dae.getMessage()); result = new
		 * ResponseEntity<Map<String, Object>>(response,
		 * HttpStatus.INTERNAL_SERVER_ERROR);
		 * 
		 * }
		 */
		if (null == result) {
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.OK);
		}
		return result;

	}

}
