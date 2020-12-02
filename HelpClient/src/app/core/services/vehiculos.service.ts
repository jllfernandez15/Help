import { Injectable } from '@angular/core';

import { Observable, of } from 'rxjs';
import { map } from 'rxjs/operators';

//import { Router } from '@angular/router';


import {HttpService} from 'src/app/core/services/common/http/http.service';

//import { AuthenticationService } from 'src/app/core/services/common/authentication/authentication.service';

import { Vehiculo } from 'src/app/core/models/Vehiculo';
import { VehiculosPaginados } from 'src/app/core/models/VehiculosPaginados';
import { PagedResponse } from '../models/common/paged/PagedResponse';
import { Role } from 'src/app/core/models/Role';
import { Usuario } from 'src/app/core/models/Usuario';


@Injectable({
  providedIn: 'root'
})
export class VehiculosService {

  private action: string = '/vehiculos';
 // private action: string = '/sample';

 
  constructor(private conn: HttpService) { }

  public vehiculos(): Observable<Vehiculo[]> {
    return this.conn.get(this.action + "/all").pipe(
      map(response => {
        return response.content as Vehiculo[];
      }));
  }

  public vehiculosPorCode(code: string): Observable<Vehiculo[]> {
   
   /* return this.conn.getByParam(this.action + "/vehiculosWithCode", code).pipe(
      map(response => {
        return response.content as Vehiculo[];
      }));*/
      let vehiculo: Vehiculo = new Vehiculo();
      vehiculo.setCode(code);
      vehiculo.setNombre("C3");

      return this.searchVehiculos(vehiculo);
  }

  public searchVehiculos(vehiculo: Vehiculo): Observable<Vehiculo[]> {
    return this.conn.post(this.action + "/search", vehiculo).pipe(
      map(response => {
        return response.content as Vehiculo[];
      }));
  }

  public roles(): Observable<Role[]> {
    return this.conn.get(this.action + "/marcas").pipe(
      map(response => {
        return response.content as Role[];
      }));
  }

  public usuarios(): Observable<Usuario[]> {
    return this.conn.get(this.action + "/usuarios").pipe(
      map(response => {
        return response.content as Usuario[];
      }));
  }

  byForm(vehiculo: Vehiculo): Observable<Vehiculo[]> {
    return this.conn.post(this.action + "/byForm", vehiculo).pipe(
      map(response => {
        return response.content as Vehiculo[];
      }));
  }

  public vehiculosPaginados(vehiculos: VehiculosPaginados): Observable<PagedResponse> {

    return this.conn.postPaged(this.action + '/paged', vehiculos).pipe(
      map(response => {
        return response as PagedResponse;
      }));

  }

  public vehiculoById(id: number): Observable<Vehiculo> {
    return this.conn.getById(this.action, id).pipe(
      map(respuesta => {
        return respuesta.content as Vehiculo;
      }));
  }

  public create(novo: Vehiculo): Observable<Vehiculo> {
    return this.conn.post(this.action, novo).pipe(
      map(respuesta => {
        return respuesta.content as Vehiculo;
      }));
  }

  public update(modified: Vehiculo): Observable<Vehiculo> {
    return this.conn.put(this.action, modified).pipe(
      map(respuesta => {
        return respuesta.content as Vehiculo;
      }));
  }

  public delete(id: number): Observable<Vehiculo> {
    return this.conn.delete(this.action, id).pipe(
      map(respuesta => {
        return respuesta.content as Vehiculo;
      }));
  }

}
