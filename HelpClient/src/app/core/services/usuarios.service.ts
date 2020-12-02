import { Injectable } from '@angular/core';

import { Observable, of } from 'rxjs';
import { map } from 'rxjs/operators';

import { HttpService } from 'src/app/core/services/common/http/http.service';

import { Usuario } from 'src/app/core/models/Usuario';
import { UsuariosPaginados } from 'src/app/core/models/UsuariosPaginados';
import { PagedResponse } from '../models/common/paged/PagedResponse';




@Injectable({
  providedIn: 'root'
})
export class UsuariosService {

  private action: string = '/usuarios';

  constructor(private conn: HttpService) { }

  public usuarios(): Observable<Usuario[]> {
    return this.conn.get(this.action + "/all").pipe(
      map(response => {
        return response.content as Usuario[];
      }));
  }


  public usuariosPaginados(usuarios: UsuariosPaginados): Observable<PagedResponse> {
    return this.conn.postPaged(this.action + '/paged', usuarios).pipe(
      map(response => {
        console.log(response);
        return response as PagedResponse;
      }));
  }

  public usuarioById(id: number): Observable<Usuario> {
    return this.conn.getById(this.action, id).pipe(
      map(respuesta => {
        return respuesta.content as Usuario;
      }));
  }

  public create(novo: Usuario): Observable<Usuario> {
    return this.conn.post(this.action, novo).pipe(
      map(respuesta => {
        return respuesta.content as Usuario;
      }));
  }

  public update(modified: Usuario): Observable<Usuario> {
    return this.conn.put(this.action, modified).pipe(
      map(respuesta => {
        return respuesta.content as Usuario;
      }));
  }

  public delete(id: number): Observable<Usuario> {
    return this.conn.delete(this.action, id).pipe(
      map(respuesta => {
        return respuesta.content as Usuario;
      }));
  }
}
