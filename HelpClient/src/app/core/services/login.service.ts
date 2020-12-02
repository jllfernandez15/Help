import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Observable, of } from 'rxjs';
import { map } from 'rxjs/operators';

import {HttpService} from 'src/app/core/services/common/http/http.service';
import { AuthenticationService } from 'src/app/core/services/common/authentication/authentication.service';

import {Usuario} from 'src/app/core/models/Usuario';
import { Response } from 'src/app/core/models/common/Response';
import { UsuariosPaginados } from '../models/UsuariosPaginados';



@Injectable({
  providedIn: 'root'
})
export class LoginService {

  private action: string = '/usuarios';

  constructor(private conn: HttpService, private oauth: AuthenticationService, private router: Router) { }

  get(): Observable<any> {
    return this.conn.get(this.action);
  }

  getById(id: number): Observable<any> {
    return this.conn.getById(this.action, id);
  }

  login(username: string, password: string): Observable<any> {
   
    return this.oauth.authenticate(username, password)
      .pipe(
        map(usuario => {
          // console.log(usuario);
          console.log(usuario);
          return usuario; 
        }));
  }


  create15(usuario: Usuario): void {
    this.conn.post(this.action, usuario).subscribe(response => {
      console.log(response);
      //response as Respuesta;

      //let token = Token.fill(response);

      //this.oauth.setToken(token);

      this.router.navigate(['/inicio']);
      //swal.fire('Login', `Hola ${usuario.username}, has iniciado sesión con éxito!`, 'success');
    }
    );
  }


  update(usuario: Usuario): void {
    this.conn.put(this.action, usuario).subscribe(response => {
      console.log(response);
      response as Response;

      this.router.navigate(['/inicio']);
      //swal.fire('Login', `Hola ${usuario.username}, has iniciado sesión con éxito!`, 'success');
    }
    );
  }


  delete(id: number): Observable<any> {
    return this.conn.delete(this.action, id);
  }



}
