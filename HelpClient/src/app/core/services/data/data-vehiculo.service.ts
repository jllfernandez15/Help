import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';

import { PagedResponse } from '../../models/common/paged/PagedResponse';
import { Vehiculo } from '../../models/Vehiculo'

@Injectable({
  providedIn: 'root'
})
export class DataVehiculoService {

  private vehiculoSource = new BehaviorSubject(new Vehiculo());
  currentVehiculo = this.vehiculoSource.asObservable();

  private vehiculosSource = new BehaviorSubject(new PagedResponse());
  currentVehiculos = this.vehiculosSource.asObservable();

  constructor() { }

  setVehiculo(vehiculo: Vehiculo) {
    this.vehiculoSource.next(vehiculo);
  }

  setVehiculos(vehiculos: PagedResponse) {
    this.vehiculosSource.next(vehiculos);
  }

  getVehiculo(): Vehiculo {
    this.currentVehiculo.subscribe(
      response => {
        let veh: Vehiculo = response as Vehiculo;
        //console.log(veh);
        return veh;
      });
      
    //return this.currentVehiculo;
    return null;
  }  
/*
  getVehiculos(): Vehiculo[] {
    this.currentVehiculos.subscribe(
      response => {
        let arr: Vehiculo[] = response as Vehiculo[];
        //console.log(veh);
        return arr;
      });
      
    //return this.currentVehiculo;
    return null;
  } */ 
}
