import { Injectable } from '@angular/core';

import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';

import { Entity } from 'src/app/core/models/common/Entity';
import { PagedRequest } from 'src/app/core/models/common/paged/PagedRequest';

import { Response } from 'src/app/core/models/common/Response';
import { PagedResponse } from 'src/app/core/models/common/paged/PagedResponse';


@Injectable({
  providedIn: 'root'
})
export class HttpService {

  private urlEndPoint: string = 'http://127.0.0.1:8082';


  private headers = new HttpHeaders().set('Access-Control-Allow-Origin', '*')
    .set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
    .set('Accept', 'application/json')
    .set('Content-Type', 'application/json; charset=utf-8');


  constructor(private http: HttpClient) {
  }

  get(action: string): Observable<Response> {
    return this.http.get(this.urlEndPoint + action, { headers: this.agregarAuthorizationHeader() }).pipe(
      map(response => response as Response));
  }

  getByParam(action: string, param: string): Observable<Response> {
    return this.http.get(`${this.urlEndPoint + action}/${param}`, { headers: this.agregarAuthorizationHeader() })
      .pipe(
        map(response => response as Response));
  }


  getById(action: string, id: number): Observable<Response> {
    return this.http.get(`${this.urlEndPoint + action}/${id}`, { headers: this.agregarAuthorizationHeader() })
      .pipe(
        map(response => response as Response));
  }

  post(action: string, novo: Entity): Observable<Response> {
    return this.http.post<any>(this.urlEndPoint + action, novo, { headers: this.agregarAuthorizationHeader() })
      .pipe(
        map(response => response as Response));
  }

  postPaged(action: string, paged: PagedRequest): Observable<PagedResponse> {
    return this.http.post<any>(this.urlEndPoint + action, paged, { headers: this.agregarAuthorizationHeader() })
      .pipe(
        map(response => response as PagedResponse));
  }

  postWithHeaders(action: string, novo: any, headers: any): Observable<any> {
    return this.http.post(this.urlEndPoint + action, novo, headers)
      .pipe(
        map(response => response as any));
  }


  put(action: string, modified: Entity): Observable<Response> {
    return this.http.put<any>(this.urlEndPoint + action, modified, { headers: this.agregarAuthorizationHeader() })
      .pipe(
        map(response => response as Response));
  }

  delete(action: string, id: number): Observable<Response> {
    return this.http.delete<any>(`${this.urlEndPoint + action}/${id}`, { headers: this.agregarAuthorizationHeader() })
      .pipe(
        map(response => response as Response));

  }

  private agregarAuthorizationHeader() {
    let token = sessionStorage.getItem("token");

    if (token != null) {
      return this.headers.append('Authorization', 'Bearer ' + token.toString());
    }
    return this.headers;
  }

}
