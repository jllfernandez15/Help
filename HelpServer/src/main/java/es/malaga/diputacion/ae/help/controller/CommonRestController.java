package es.malaga.diputacion.ae.help.controller;

import java.util.HashMap;
import java.util.Map;

import org.springframework.dao.DataAccessException;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;

//@RestController
@CrossOrigin(origins = { "*" })
//@RequestMapping("/api")
public class CommonRestController {

	public ResponseEntity<?> errorHandler(Exception e) {
		ResponseEntity<?> result = null;
		Map<String, Object> response = new HashMap<String, Object>();

		if (e instanceof DataAccessException) {
			response.put("mensaje", "Error en BBDD");
			response.put("error", e.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.INTERNAL_SERVER_ERROR);

		} else {
			// response.put("mensaje", "El usuario".concat(id.toString()).concat(" NO se ha
			// encontrado."));
			response.put("error", e.getMessage());
			result = new ResponseEntity<Map<String, Object>>(response, HttpStatus.NOT_FOUND);

		}
		return result;

	}

}
