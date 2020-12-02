import { Component, OnInit } from '@angular/core';

import { DataVehiculoService } from '../../../core/services/data/data-vehiculo.service';
import { DatatableComponent } from '../../../shared/components/datatable/datatable.component';
import { Entity } from '../../../core/models/common/Entity';
import { Vehiculo } from 'src/app/core/models/Vehiculo';


@Component({
  selector: 'app-vehiculos',
  templateUrl: './vehiculos.component.html',
  styleUrls: ['./vehiculos.component.scss']
})
export class VehiculosComponent implements OnInit {

  private vehiculo: Vehiculo;
 // private vehiculos: Vehiculo[];

  //El array enlaces debe ser de la siguiente estructura
  public links: Array<Object> = [

    // { link: '<link>', logo: '<ruta a la imagen>', title: '<descripcion>' },
    { link: '/wellcome', logo: 'assets/ngx-rocket-logo.png', title: 'Pantalla de Inicio' }
  ]

  public columnas: Array<Object> = [];
  public hiddensButtons: Array<boolean> = [false, false];;
  public dataSource: Array<Entity> = [];

  columns: Object[] = [
    { label: 'id', name: 'id', width: '1%', hidden: true },
    { label: 'Login', name: 'nombre', width: '70%' },
    { label: 'Tipo', name: 'code', width: '30%' }
  ];

  public titulo: String = "Titulo";
  public tableFoot: String = "Pie de Tabla";

  public source: any[] = [
   /* { id: 1, login: 'Description 1', tipo: 'tipo 1' },
    { id: 2, login: 'Description 2', tipo: 'tipo 2' },
    { id: 3, login: 'Description 3', tipo: 'tipo 3' },
    { id: 4, login: 'Description 4', tipo: 'tipo 4' },
    { id: 5, login: 'Description 5', tipo: 'tipo 5' }
*/
  ];

  constructor(private dataVehiculoService: DataVehiculoService) { }


  ngOnInit() {

    this.dataVehiculoService.currentVehiculo.subscribe(response => {
        this.vehiculo = response as Vehiculo;
        //console.log(this.vehiculo.getCode());
      });



    //this.hiddensButtons[0] = false;
    //this.hiddensButtons[1] = false;

    this.columnas = this.columns;
    this.dataSource = this.source;
    this.dataSource.length = this.source.length;

    //let veh: Vehiculo = this.getVehiculo();
    
   //alert("------------->" + this.getVehiculo().nombre);

  }

  getVehiculo(): Vehiculo {
    return this.vehiculo;
  }

  setVehiculo(vehiculo: Vehiculo) {
    this.dataVehiculoService.setVehiculo(vehiculo);
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

}
