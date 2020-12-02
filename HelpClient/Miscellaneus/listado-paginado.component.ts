import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { NgForm } from '@angular/forms';

import swal from 'sweetalert2';


//Services
import { ErrorService } from 'src/app/core/services/common/error/error.service';
import { VehiculosService } from 'src/app/core/services/vehiculos.service';
import { DataVehiculoService } from 'src/app/core/services/data/data-vehiculo.service';
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
  selector: 'app-listado-paginado',
  templateUrl: './listado-paginado.component.html',
  styleUrls: ['./listado-paginado.component.scss']
})
export class ListadoPaginadoComponent implements OnInit {
  public vehiculo = new Vehiculo();

  //El array enlaces debe ser de la siguiente estructura
  public links: Array<Object> = [
    // { link: '<link>', logo: '<ruta a la imagen>', title: '<descripcion>' },
    { link: '/wellcome', logo: 'assets/ngx-rocket-logo.png', title: 'Pantalla de Inicio' }
  ]

  public columnas: Array<Object> = [];
  public hiddensButtons: Array<boolean> = [false, false];;
  public dataSource: PagedResponse;

  public filter: VehiculosPaginados;

  columns: Object[] = [
    { label: 'id', name: 'id', width: '1%', hidden: true },
    { label: 'Login', name: 'nombre', width: '70%' },
    { label: 'Tipo', name: 'code', width: '30%' }
  ];

  public titulo: String = "Titulo";
  public tableFoot: String = " Pie de Tabla";
  public target = "/vehiculos/paged";

  //public source: PagedResponse;

  // @ViewChild('child1') childOne:Hijo1Component;
  //@ViewChild('child2') childTwo:Hijo2Component;

  constructor(private vehiculosService: VehiculosService,
    private activatedRoute: ActivatedRoute, private filterService: FilterService,
    private error: ErrorService) { }


  ngOnInit() {

    this.initPageResponse();

    this.initForm();
    /*
    this.filterService.currentFilter.subscribe(response => {
      this.filter = response as VehiculosPaginados;

      if (this.filter.getVehiculo() != undefined) {
        let code = this.filter.getVehiculo().getCode();
        let nombre = this.filter.getVehiculo().getNombre();

        this.vehiculo.setCode(code);
        this.vehiculo.setNombre(nombre);

      }

    });
*/
    let page: number = 0;
    this.activatedRoute.paramMap.subscribe(params => {
      page = +params.get('page');

      if (!page) {
        page = 0;
      }

      this.vehiculosService.vehiculosPaginados(this.prepareFilter(page)).subscribe(response => {
        console.log('Vehiculos: ');
        console.log(response);

        this.columnas = this.columns;
        this.dataSource = response;

      }, err => {
        this.error.errorHandler(err);
      });
    });

    /*
        this.childOne.emitEvent
        .subscribe(
          res =>
          {
          console.log("Atributo:" + res);
          this.childTwo.dataShared = res;
          }
        );
      }
    */
  }

  prepareFilter(page: number): VehiculosPaginados {
    let vehiculos: VehiculosPaginados = new VehiculosPaginados();

    let paged: Paged = new Paged();
    paged.page = page;
    paged.pageSize = 2;
    paged.orderField = "Code";
    paged.orderType = "ASC";

    vehiculos.setPaged(paged);

    let vehiculo: Vehiculo = new Vehiculo();
    vehiculo.setCode(this.vehiculo.getCode());
    vehiculo.setNombre(this.vehiculo.getNombre());

    vehiculos.setVehiculo(vehiculo);

    return vehiculos;
  }

  initPageResponse() {
    this.dataSource = new PagedResponse();
    this.dataSource.content = [];
    this.dataSource.page = 0;
    this.dataSource.pageSize = 0;
    this.dataSource.total = 0;
    this.dataSource.totalPages = 0;

  }

  initForm() {
    this.filterService.currentFilter.subscribe(response => {
      this.filter = response as VehiculosPaginados;

      if (this.filter.getVehiculo() != undefined) {
        let code = this.filter.getVehiculo().getCode();
        let nombre = this.filter.getVehiculo().getNombre();

        this.vehiculo.setCode(code);
        this.vehiculo.setNombre(nombre);

      }

    });

  }

  onSubmit(f: NgForm) {

    this.vehiculosService.vehiculosPaginados(this.prepareFilter(0)).subscribe(response => {
      console.log('Vehiculos: ');
      console.log(response);

      this.columnas = this.columns;
      this.dataSource = response;

    }, err => {
      this.error.errorHandler(err);
    });

  }


  rowClicked(row: any): void {
    //console.log('Row clicked: ', row);
    alert('Click ' + row.id + "-------- " + row.login);
  }

  rowEdited(row: any): void {
    //console.log('Row clicked: ', row);
    alert('Edited ' + row.id + "-------- " + row.login);
  }

  rowDeleted(row: any): void {
    //console.log('Row clicked: ', row);
    alert('Deleted ' + row.id + "-------- " + row.login);
  }

  /*
  change():void{
    this.childOne.function1();
  }*/
}
