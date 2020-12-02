import { Injectable } from '@angular/core';
import { map } from 'rxjs/operators';
import { HttpHeaders } from '@angular/common/http';

import { of, Observable } from 'rxjs';
import swal from 'sweetalert2';


import { HttpService } from 'src/app/core/services/common/http/http.service';

import {Token} from 'src/app/core/models/common/Token';
import {Usuario} from 'src/app/core/models/Usuario';

@Injectable({
  providedIn: 'root'
})
export class AuthenticationService {

  private urlValidation = "/validation";

  private _usuario: Usuario;
  private _token: string;


  constructor(private conn: HttpService) { }

  public authenticate(username: string, password: string): Observable<any> {
    const urlOauthToken = '/oauth/token';
    const credenciales = btoa('angularapp' + ':' + '12345');

    const httpHeaders = new HttpHeaders({
      'Content-Type': 'application/x-www-form-urlencoded',
      'Authorization': 'Basic ' + credenciales
    });

    let params = new URLSearchParams();
    params.set('grant_type', 'password');
    params.set('username', username);
    params.set('password', password);
    console.log(params.toString());

    let usuario = null;
    let error = null;

    return this.conn.postWithHeaders(urlOauthToken, params.toString(), { headers: httpHeaders })
      .pipe(
        map(response => {
         // console.log(response);
          let token = Token.fill(response.access_token);
          this.setToken(token);

          usuario = this._usuario;
          return usuario;
        }));
  }



  public authenticare(username: string, password: string): Observable<any> {
    const urlOauthToken = '/oauth/token';
    const credenciales = btoa('angularapp' + ':' + '12345');

    const httpHeaders = new HttpHeaders({
      'Content-Type': 'application/x-www-form-urlencoded',
      'Authorization': 'Basic ' + credenciales
    });

    let params = new URLSearchParams();
    params.set('grant_type', 'password');
    params.set('username', username);
    params.set('password', password);
    console.log(params.toString());

    let usuario = null;
    let error = null;

    return this.conn.postWithHeaders(urlOauthToken, params.toString(), { headers: httpHeaders })
      .pipe(
        map(response => {
         // console.log(response);
          let token = Token.fill(response.access_token);
          this.setToken(token);

          usuario = this._usuario;
          return usuario;
        }));
  }


  public setToken(token: Token): void {
    this.guardarUsuario(token.access_token);
    this.guardarToken(token.access_token);

  }

  private guardarUsuario(accessToken: string): void {
    let user = this.obtenerDatosToken(accessToken);
    this._usuario = new Usuario();
    this._usuario.login = user.user_name;
    console.log(this._usuario.login);

    sessionStorage.setItem('usuario', JSON.stringify(this._usuario));
  }

  private guardarToken(accessToken: string): void {
    this._token = accessToken;
    console.log(accessToken);
    sessionStorage.setItem("token", accessToken);
  }

  private obtenerDatosToken(accessToken: string): any {
    if (accessToken != null) {
      console.log(accessToken);
      return JSON.parse(atob(accessToken.split(".")[1]));
    }
    return null;
  }

  private isAuthenticated(): boolean {
    let user = this.obtenerDatosToken(this._token);
    // if (payload != null && payload.user_name && payload.user_name.length > 0) {
    if (user != null && user.user_name && user.user_name.length > 0) {
      return true;
    }
    return false;
  }

  private hasRole(role: string): boolean {
    /*if (this.usuario.roles.includes(role)) {
      return true;
    }
    return false;
    */
    return true;
  }


  logout(): void {
    this._token = null;
    this._usuario = null;
    sessionStorage.clear();
    sessionStorage.removeItem('token');
    sessionStorage.removeItem('usuario');
  }

  canActivate(): void {
    /*
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
    if (this.authService.isAuthenticated()) {
      if (this.isTokenExpirado()) {
        this.authService.logout();
        this.router.navigate(['/login']);
        return false;
      }
      return true;
    }
    this.router.navigate(['/login']);
    return false;*/
  }

  isTokenExpirado(): boolean {
    let token = this._token;
    let payload = this.obtenerDatosToken(token);
    let now = new Date().getTime() / 1000;
    if (payload.exp < now) {
      return true;
    }
    return false;
  }


}
