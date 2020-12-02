import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';

import swal from 'sweetalert2';

import { ErrorService } from 'src/app/core/services/common/error/error.service';
import { LoginService } from 'src/app/core/services/login.service';

import { Usuario } from '../../core/models/Usuario';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  public titulo: string = "Usuarios";
  //usuario: Usuario;//
  //usuario:Usuario = null;
  usuario:Usuario = new Usuario();

  constructor(private login: LoginService,
    private router: Router, private error: ErrorService) {
      this.usuario = new Usuario();
  }

  ngOnInit() {
  }

  onSubmit(f: NgForm) {
    // this.callService(this.clienteModel, f);
    //this.miServicio.execute(cli);
    //this.login.login(this.usuario.login, this.usuario.pass);
    // swal.fire("Good job!" + this.usuario.login, "You are inside!", "success");

  }

  autenticar(): void {

   // let usu: Usuario = null;
    if (this.usuario.login == null || this.usuario.pass == null) {
      console.log('NULOS .....');
      swal.fire('Error Login', 'Username o password vacías!', 'error');
    } else {

      this.login.login(this.usuario.login, this.usuario.pass).subscribe(usuario => {

        if (usuario.login != "") {
          swal.fire('Login', `Hola ${usuario.login}, has iniciado sesión con éxito!`, 'success');
          this.router.navigate(['/wellcome']);
        }
      }, err => {
        this.error.errorHandler(err);
      });
    }
  }
}
