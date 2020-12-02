import { Injectable } from '@angular/core';
import { Router } from '@angular/router';

import swal from 'sweetalert2';

@Injectable({
  providedIn: 'root'
})

export class ErrorService {

  private urlValidation = "/login";

  constructor(private router: Router) { }

  errorHandler(err: any) {
    if (err.status == 401) {
      swal.fire('Error Login', 'Usuario o clave incorrectas!', 'error');
      this.router.navigate([this.urlValidation]);
    }
    if (err.status == 403) {
      //this.router.navigate(['/validacion']);
      this.router.navigate([this.urlValidation]);
      swal.fire('Error Validacion', 'Usuario No Validado', 'error');
      return null;
    }
    if (err.status == 404) {
      //this.router.navigate(['/validacion']);
      this.router.navigate([this.urlValidation]);
      console.log(err.error.mensaje);
      swal.fire('Error Recurso', err.error.mensaje, 'error');
      return null;
    }
    if (err.status == 0) {
      swal.fire('Error Login', 'Error de conexión!', 'error');
      this.router.navigate([this.urlValidation]);
    }

  }

}
