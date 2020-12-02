package es.malaga.diputacion.ae.help.filters;

import es.malaga.diputacion.ae.help.modelos.entity.Vehiculo;

public class VehiculosPagination {

	private Paged paged;

	private Vehiculo vehiculo;

	public Paged getPaged() {
		return paged;
	}

	public void setPaged(Paged paged) {
		this.paged = paged;
	}

	public Vehiculo getVehiculo() {
		return vehiculo;
	}

	public void setVehiculo(Vehiculo vehiculo) {
		this.vehiculo = vehiculo;
	}
}
