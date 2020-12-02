import { Component, OnInit } from '@angular/core';

import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';

import swal from 'sweetalert2';

//Services
import { ErrorService } from 'src/app/core/services/common/error/error.service';
import { VehiculosService } from 'src/app/core/services/vehiculos.service';
import { DataVehiculoService } from 'src/app/core/services/data/data-vehiculo.service';
import { FilterService } from 'src/app/core/services/common/filter/filter.service';


//Models
import { Vehiculo } from 'src/app/core/models/Vehiculo';
import { Role } from 'src/app/core/models/Role';
import { Componente } from 'src/app/core/models/Componente';
import { Paged } from 'src/app/core/models/common/paged/Paged';
import { PagedResponse } from 'src/app/core/models/common/paged/PagedResponse';

import { VehiculosPaginados } from 'src/app/core/models/VehiculosPaginados';


@Component({
  selector: 'app-wellcome',
  templateUrl: './wellcome.component.html',
  styleUrls: ['./wellcome.component.scss']
})
export class WellcomeComponent implements OnInit {


  public titulo: string = "Vehiculos";

  public vehiculo = new Vehiculo();

  constructor(private vehiculosService: VehiculosService, private dataVehiculoService: DataVehiculoService,
    private router: Router,
    private error: ErrorService, private filterService: FilterService) {

  }

  ngOnInit() {
  }

  onSubmit(f: NgForm) {
    // this.callService(this.clienteModel, f);
    //this.miServicio.execute(cli);
    //this.login.login(this.usuario.login, this.usuario.pass);
    //swal.fire("Good job!" + this.usuario.login, "You are inside!", "success");
    swal.fire("Good job!" + this.vehiculo.getNombre(), "You are inside!", "success");


  }

  pruebaVehiculos(): void {
    alert('Vehiculos');
    this.vehiculosService.vehiculos().subscribe(response => {
      alert(response[1].code);
      this.router.navigate(["/wellcome"]);

    }, err => {
      this.error.errorHandler(err);
    });

  }

  pruebaVehiculo(): void {
    this.vehiculosService.vehiculoById(3).subscribe(response => {
      console.log('response: ');
      //console.log(response);
      //console.log(usuario.role.capabilitys);
      this.dataVehiculoService.setVehiculo(response as Vehiculo);
      //this.router.navigate(["/vehiculos"]);
    }, err => {
      //this.errorHandler(err);
      this.error.errorHandler(err);
    });

  }

  pruebaPagesVehiculos(): void {
    console.log('Vehiculos Peticion: ');
    let vehiculos: VehiculosPaginados = new VehiculosPaginados();

    let paged: Paged = new Paged();
    paged.page = 0;
    paged.pageSize = 2;
    paged.orderField = "Code";
    paged.orderType = "ASC";

    vehiculos.setPaged(paged);

    let vehiculo: Vehiculo = new Vehiculo();
    vehiculo.setCode(this.vehiculo.code);
    vehiculo.setNombre(this.vehiculo.nombre);

    vehiculos.setVehiculo(vehiculo);

    this.filterService.setFilter(vehiculos);

    this.router.navigate(["/vehiculos/paged/0"]);

  }

  pruebaNewVehiculo(): void {
    let vehiculo = new Vehiculo();
    let compo = new Componente();
    compo.id = 1;
    vehiculo.setNombre(this.vehiculo.nombre);
    vehiculo.setCode(this.vehiculo.code);

    vehiculo.setComponente(compo);

    this.vehiculosService.create(vehiculo).subscribe(response => {
      let veh: Vehiculo = response;
      console.log('Vehiculo: ');
      console.log(veh.id);
    }, err => {
      this.error.errorHandler(err);
    });

  }

  pruebaUpdateVehiculo(): void {
    let vehiculo = new Vehiculo();
    let compo = new Componente();
    compo.id = 1;
    vehiculo.id = 3;
    vehiculo.setNombre("ModifiedOk");
    vehiculo.setCode("Code151515");
    vehiculo.componente = compo;


    this.vehiculosService.update(vehiculo).subscribe(response => {
      console.log('Vehiculo: ');
      console.log(response);
    }, err => {
      this.error.errorHandler(err);
    });

  }


  pruebaDeleteVehiculo(): void {
    this.vehiculosService.delete(-33).subscribe(response => {
      console.log('Vehiculo: ');
      console.log(response);
    }, err => {
      this.error.errorHandler(err);
    });

  }

  vehiculoPorCode(): void {
    let vehiculo: Vehiculo = new Vehiculo();
    vehiculo.setCode(this.vehiculo.code);
    vehiculo.setNombre(this.vehiculo.nombre);

    this.vehiculosService.searchVehiculos(vehiculo).subscribe(response => {
      let vehiculos: Vehiculo[] = response;
      console.log('Vehiculo: ');
      console.log(vehiculos);
      alert(vehiculos);
    }, err => {
      this.error.errorHandler(err);
    });

  }

  roles(): void {
    this.vehiculosService.roles().subscribe(response => {
      let vehiculos: Role[] = response;
      console.log('Roles: ');
      console.log(vehiculos);
      alert(vehiculos);
    }, err => {
      this.error.errorHandler(err);
    });

  }

  byForm(): void {
    let vehiculo: Vehiculo = new Vehiculo();
    vehiculo.setCode(this.vehiculo.code);
    vehiculo.setNombre(this.vehiculo.nombre);

    this.vehiculosService.byForm(vehiculo).subscribe(response => {
      let vehiculos: Vehiculo[] = response;
      console.log('Vehiculo: ');
      console.log(vehiculos);
      alert(vehiculos);
    }, err => {
      this.error.errorHandler(err);
    });

  }

}
