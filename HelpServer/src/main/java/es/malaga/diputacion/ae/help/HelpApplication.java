package es.malaga.diputacion.ae.help;

import java.util.Collections;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class HelpApplication {

	public static void main(String[] args) {
		// SpringApplication.run(DemoApplication.class, args);

		SpringApplication app = new SpringApplication(HelpApplication.class);

		app.setDefaultProperties(Collections.singletonMap("server.port", "8082"));
		app.run(args);
	}

}
