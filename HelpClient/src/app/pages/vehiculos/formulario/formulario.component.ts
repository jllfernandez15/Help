import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { NgForm } from '@angular/forms';

//Services
import { ErrorService } from 'src/app/core/services/common/error/error.service';
import { VehiculosService } from 'src/app/core/services/vehiculos.service';
import { FilterService } from 'src/app/core/services/common/filter/filter.service';


//Models
import { Vehiculo } from 'src/app/core/models/Vehiculo';
import { Entity } from 'src/app/core/models/common/Entity';
import { Paged } from 'src/app/core/models/common/paged/Paged';
import { PagedResponse } from 'src/app/core/models/common/paged/PagedResponse';
//import { PagedRequest } from 'src/app/core/models/common/paged/PagedRequest';
import { VehiculosPaginados } from 'src/app/core/models/VehiculosPaginados';
import { PagedRequest } from 'src/app/core/models/common/paged/PagedRequest';

@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.scss']
})
export class FormularioComponent implements OnInit {

  public filter: VehiculosPaginados;
  public vehiculo = new Vehiculo();
  public titulo: String = "Titulo"; 

  @Output() emitEvent:EventEmitter<String> = new EventEmitter<String>();
  code:String = "";
  @Output() emitEventnombre:EventEmitter<String> = new EventEmitter<String>();
  nombre:String = "";

  constructor(private vehiculosService: VehiculosService,
    private activatedRoute: ActivatedRoute,
    private error: ErrorService, private filterService: FilterService) { }


  ngOnInit() {

    this.filterService.currentFilter.subscribe(response => {
      this.filter = response as VehiculosPaginados;

      let code = this.filter.getVehiculo().getCode();
      let nombre = this.filter.getVehiculo().getNombre();

      this.vehiculo.setCode(code);
      this.vehiculo.setNombre(nombre);

    });

    this.fillCode();
    this.fillNombre();
  }

  public fillCode(): String{
    let fcode = this.code;
    this.emitEvent.emit(fcode);
    return fcode;
  }

  public fillNombre(): String{
    let fnombre = this.nombre;
    this.emitEventnombre.emit(fnombre);
    return fnombre;
  }

  onSubmit(f: NgForm) {

    let vehiculos: VehiculosPaginados = new VehiculosPaginados();

    let paged: Paged = new Paged();
    paged.page = 0;
    paged.pageSize = 2;
    paged.orderField = "Code";
    paged.orderType = "ASC";

    vehiculos.setPaged(paged);

    let vehiculo: Vehiculo = new Vehiculo();
    vehiculo.setCode(this.vehiculo.getCode());
    vehiculo.setNombre(this.vehiculo.getNombre());

    vehiculos.setVehiculo(vehiculo);
    this.filterService.setFilter(vehiculos);
  
  }
}
