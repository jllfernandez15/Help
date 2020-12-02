import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { NgForm } from '@angular/forms';

import swal from 'sweetalert2';
import { isUndefined } from 'util';


//Services
import { ErrorService } from 'src/app/core/services/common/error/error.service';
import { VehiculosService } from 'src/app/core/services/vehiculos.service';
import { FilterService } from 'src/app/core/services/common/filter/filter.service';


//Models
import { Vehiculo } from 'src/app/core/models/Vehiculo';
import { Role } from 'src/app/core/models/Role';
import { Usuario } from 'src/app/core/models/Usuario';
import { Paged } from 'src/app/core/models/common/paged/Paged';
import { PagedResponse } from 'src/app/core/models/common/paged/PagedResponse';
import { VehiculosPaginados } from 'src/app/core/models/VehiculosPaginados';

import { Nodo } from 'src/app/core/models/common/Nodo';
import { TreeComponent } from 'src/app/shared/components/tree/tree.component';

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
    { label: 'Nombre', name: 'nombre', width: '70%' },
    { label: 'Code', name: 'code', width: '30%' }
  ];

  public titulo: String = "Titulo";
  public tableFoot: String = " Pie de Tabla";
  public target = "/vehiculos/paged";


  public dataTree: Nodo[];
  public tituloTree: String = "Vehiculos";

  public dataRoles: Nodo[];
  //public usuarios: Usuario[];
  public tituloRoles: String = "Roles";

  @ViewChild('tree') tree: TreeComponent;
  @ViewChild('roles') roles: TreeComponent;


  constructor(private vehiculosService: VehiculosService,
    private activatedRoute: ActivatedRoute, private filterService: FilterService,
    private error: ErrorService) { }


  ngOnInit() {

    this.initPageResponse();

    this.initForm();

    this.initTrees();

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
        this.dataTree = this.renderTree(response.content as Vehiculo[]);

      }, err => {
        this.error.errorHandler(err);
      });

     

    });
    
  }


  renderTree(source: Vehiculo[]): Nodo[] {
    let tree: Nodo[] = [];

    if (source.length > 0) {
      let root: Nodo = new Nodo();
      root = new Nodo();
      root.id = -1;
      root.name = "Vehiculos";
      root.subnodes = [];

      let cont: number = source.length;
      let subnodes: Nodo[] = [];

      for (var i = 0, max = cont; i < max; i += 1) {
        let nodo: Nodo = new Nodo();
        let veh: Vehiculo = source[i];
        nodo.id = veh.id;
        nodo.name = veh.nombre;
        nodo.class = "fas fa-basketball-ball ic-w mr-1";
        nodo.subnodes = [];
        if (veh.componente != null) {
          if (isUndefined(veh.componente)) {

          }
          let subnodo: Nodo = new Nodo();
          subnodo.id = veh.componente.id;
          subnodo.name = veh.componente.code;
          subnodo.class = "fas fa-basketball-ball ic-w mr-1";
          subnodo.subnodes = [];

          nodo.subnodes.push(subnodo);
          //for all
          //source[i].sons = this.renderTree(source[i].sons);
        }
        subnodes.push(nodo);
      }
      root.subnodes = subnodes;
      tree.push(root);
    }

    return tree;
  }

  fillSons(source: Usuario[], father: Nodo): Nodo {
    //if (null != source) {
    if (!isUndefined(source)) {
      for (var i = 0, max = source.length; i < max; i += 1) {
        if (father.id == source[i].role.id) {
          let son: Nodo = new Nodo();

          son.id = source[i].id;
          son.name = source[i].login;
          son.class = "fas fa-basketball-ball ic-w mr-1";
          son.subnodes = [];

          father.subnodes.push(son);
        }
      }
    }
    //}
    return father;
  }

  renderTreeRoles(source: Role[], usuarios: Usuario[]): Nodo[] {
    let tree: Nodo[] = [];

    if (source.length > 0) {
      let root: Nodo = new Nodo();
      root = new Nodo();
      root.id = -1;
      root.name = "Roles";
      root.subnodes = [];

      let cont: number = source.length;
      let subnodes: Nodo[] = [];

      for (var i = 0, max = cont; i < max; i += 1) {
        let nodo: Nodo = new Nodo();
        let role: Role = source[i];
        nodo.id = role.id;
        nodo.name = role.code;
        console.log('----------------');
        console.log(role.usuarios);
        nodo.class = "fas fa-basketball-ball ic-w mr-1";
        nodo.subnodes = [];

        nodo = this.fillSons(usuarios, nodo);
        subnodes.push(nodo);
      }
      root.subnodes = subnodes;
      tree.push(root);
    }

    return tree;
  }

  initTrees(): void {

    let usuarios: Usuario[] = [];
    
   
    let roles:Role[];

    this.vehiculosService.roles().subscribe(response => {
      console.log('Roles: ');
      console.log(response);

      roles = response as Role[];

      this.vehiculosService.usuarios().subscribe(response => {
        console.log('Usuarios: ');
        console.log(response);
  
        usuarios = response as Usuario[];
        this.dataRoles = this.renderTreeRoles(roles, usuarios);
      }, err => {
        this.error.errorHandler(err);
      });
            
    }, err => {
      this.error.errorHandler(err);
    });

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
    //this.usuarios = [];

  }

  initForm() {
    this.filterService.currentFilter.subscribe(response => {
      this.filter = response as VehiculosPaginados;
      try {
        if (isUndefined(this.filter.getVehiculo())) {
          //if (undefined != this.filter.getVehiculo()) {
          let code = this.filter.getVehiculo().getCode();
          let nombre = this.filter.getVehiculo().getNombre();

          this.vehiculo.setCode(code);
          this.vehiculo.setNombre(nombre);

        }
      } catch (e) {
        console.log('error' + e);
      }
    });

  }

  onSubmit(f: NgForm) {

    this.vehiculosService.vehiculosPaginados(this.prepareFilter(0)).subscribe(response => {
      console.log('Vehiculos: ');
      console.log(response);

      this.columnas = this.columns;
      this.dataSource = response;
      this.dataTree = this.renderTree(response.content as Vehiculo[]);
    }, err => {
      this.error.errorHandler(err);
    });

  }


  rowClicked(row: any): void {
    //console.log('Row clicked: ', row);
    alert('Click ' + row.id + "-------- " + row.name);
  }

  rowEdited(row: any): void {
    //console.log('Row clicked: ', row);
    alert('Edited ' + row.id + "-------- " + row.name);
  }

  rowDeleted(row: any): void {
    //console.log('Row clicked: ', row);
    alert('Deleted ' + row.id + "-------- " + row.name);
  }

  cellClick(item: any): void {

    //alert('Pulse en ' + item.name);
    //let selectedItem = this.tree.getSelectedItem();
    // console.log('Pulse en ' + item.srcElement.innerText + ' con id ' + item.srcElement.value);
    let nodo: Nodo = this.tree.getSelectedItem();
    console.log('Pulse en ' + nodo.name);
  }

  contextmenuMenu(event: any) {
    /*
    if ((<HTMLInputElement>event.target).classList.contains('jqx-tree-item')) {
      this.tree.selectItem(event.target);
      let scrollTop = window.scrollY;
      let scrollLeft = window.scrollX;
  
      this.menu.open(event.clientX + 5 + scrollLeft, event.clientY + 5 + scrollTop);
      return false;
    } else {
      this.menu.close();
    }*/
  }

  processTreeExpand(event: any): void {
    let args = event.args;
    //let item = this.tree.getItem(args.element);
  }

  processTreeCollapse(event: any): void {
    let args = event.args;
    //let item = this.tree.getItem(args.element);
  }

  processTreeSelect(event: any): void {
    /*
    let selectedItem = this.tree.getSelectedItem();
    if (selectedItem != null) {
      this.dataSourceTabla = [];
      let json: NodoZona[] = this.data;
      let zona = this.processRecursive(json, selectedItem.element.id);
  
      let cont = 0;
      //clean dataSource
      for (var j = 0, max = zona.sons.length; j < max; j += 1) {
        this.dataSourceTabla[cont] = zona.sons[j];
        cont++;
      }
      let id: number = selectedItem.element.id;
      this.zonasService.getSensoresByZona(id).subscribe(response => {
        let sensoresRelacionados: NodoSensor[] = response;
  
        for (var i = 0, max = sensoresRelacionados.length; i < max; i += 1) {
          this.dataSourceTabla.push(this.translateToZona(sensoresRelacionados[i]));
        }
  
        this.actualizaGrid();
      });
  
      this.actualizaGrid();
      */
  }

  cellClick1(item: any): void {

    //alert('Pulse en ' + item.name);
    //let selectedItem = this.tree.getSelectedItem();
    // console.log('Pulse en ' + item.srcElement.innerText + ' con id ' + item.srcElement.value);
    let nodo: Nodo = this.roles.getSelectedItem();
    console.log('Pulse en ' + nodo);
  }

  contextmenuMenu1(event: any) {
    /*
    if ((<HTMLInputElement>event.target).classList.contains('jqx-tree-item')) {
      this.tree.selectItem(event.target);
      let scrollTop = window.scrollY;
      let scrollLeft = window.scrollX;
  
      this.menu.open(event.clientX + 5 + scrollLeft, event.clientY + 5 + scrollTop);
      return false;
    } else {
      this.menu.close();
    }*/
  }

  processTreeExpand1(event: any): void {
    let args = event.args;
    //let item = this.tree.getItem(args.element);
  }

  processTreeCollapse1(event: any): void {
    let args = event.args;
    //let item = this.tree.getItem(args.element);
  }

  processTreeSelect1(event: any): void {
    /*
    let selectedItem = this.tree.getSelectedItem();
    if (selectedItem != null) {
      this.dataSourceTabla = [];
      let json: NodoZona[] = this.data;
      let zona = this.processRecursive(json, selectedItem.element.id);
  
      let cont = 0;
      //clean dataSource
      for (var j = 0, max = zona.sons.length; j < max; j += 1) {
        this.dataSourceTabla[cont] = zona.sons[j];
        cont++;
      }
      let id: number = selectedItem.element.id;
      this.zonasService.getSensoresByZona(id).subscribe(response => {
        let sensoresRelacionados: NodoSensor[] = response;
  
        for (var i = 0, max = sensoresRelacionados.length; i < max; i += 1) {
          this.dataSourceTabla.push(this.translateToZona(sensoresRelacionados[i]));
        }
  
        this.actualizaGrid();
      });
  
      this.actualizaGrid();
      */
  }


}
