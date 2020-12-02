import { Component, ViewChild, OnInit, AfterViewInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { jqxTreeComponent } from 'jqwidgets-scripts/jqwidgets-ts/angular_jqxtree';
import { jqxMenuComponent } from 'jqwidgets-scripts/jqwidgets-ts/angular_jqxmenu';

import { ZonasService } from '../../core/services/zonas.service';
import { NodoZona } from '../../core/models/NodoZona';
import { isUndefined } from 'util';
import { jqxGridComponent } from 'jqwidgets-scripts/jqwidgets-ts/angular_jqxgrid';

@Component({
  selector: 'app-zonas',
  templateUrl: './zonas.component.html',
  styleUrls: ['./zonas.component.scss']
})
export class ZonasComponent implements OnInit {
  titulo: string;
  labelTitulo = '';

  dataSourceTabla: any[] = [];

  // prepare the data
  sourceTabla = {
    datatype: 'json',
    datafields: [
      { name: 'id', type: 'number' },
      { name: 'descripcion', type: 'string' },
      { name: 'tipo', type: 'string' }
    ],
    localdata: this.dataSourceTabla
  };
  dataAdapterTable: any = new jqx.dataAdapter(this.sourceTabla);

  columns: any[] = [
    { text: 'id', datafield: 'id', width: '1%', hidden: true },
    { text: 'Descripcion', datafield: 'descripcion', width: '70%' },
    { text: 'Tipo', datafield: 'tipo', width: '30%' }
  ];

  submenu: Array<any> = [
    { name: 'portadores', label: 'Portadores' },
    { name: 'perfiles', label: 'Perfiles' },
    { name: 'alertas', label: 'Alertas' },
    { name: 'plano', label: 'Ver Plano' }
  ];

  @ViewChild('tree', null) tree: jqxTreeComponent;
  @ViewChild('menu', null) menu: jqxMenuComponent;
  @ViewChild('grid') Grid: jqxGridComponent;

  data: any[] = [];
  // prepare the data
  source = {
    datatype: 'json',
    datafields: [{ name: 'id' }, { name: 'tipo' }, { name: 'label' }, { name: 'items' }],
    id: 'id',
    localdata: this.data
  };
  // create data adapter & perform Data Binding.
  dataAdapter = new jqx.dataAdapter(this.source, { autoBind: true });
  records: any = this.dataAdapter.getRecordsHierarchy('id', 'label');

  constructor(private activatedRoute: ActivatedRoute, private router: Router, private zonasService: ZonasService) {
    this.titulo = this.labelTitulo;
  }

  ngOnInit() {
    this.dataSourceTabla = [];
    //this.myTreeOnInitialized();

    this.zonasService.getZonas().subscribe(response => {
      let zonas: NodoZona[] = this.zonasService.flatToTree(response);
      this.data = this.renderTree(zonas);
      this.tree.addTo(this.data, null);

      this.tree.render;
    });

    this.actualizaGrid();
  }

  renderTree(source: NodoZona[]) {
    for (var i = 0, max = source.length; i < max; i += 1) {
      if (source[i].sons.length > 0) {
        source[i].sons = this.renderTree(source[i].sons);
      }

      source[i]['icon'] = this.mapeo(source[i].tipo);
      source[i]['label'] = source[i]['descripcion'];
      source[i]['items'] = source[i]['sons'];
    }

    return source;
  }

  mapeo(key: number) {
    if (key == 0) return '../../../assets/img/buscar.gif';
    //'fas fa-users ic-w mr-1';
    else if (key == 1) return '../../../assets/img/buscar.gif';
    else if (key == 2) return '../../../assets/img/buscar.gif';
    else if (key == 3) return '../../../assets/img/buscar.gif';
    else if (key == 15) return '../../../assets/icons/Color/16x/Actualizar 2_16px.png';

    return 'far fa-comment ic-w mr-1';
  }

  filtrarZonas(termino: string) {
    console.log(termino);

    this.zonasService.getZonasFilter(termino).subscribe(response => {
      console.log(<NodoZona[]>response);
      this.dataSourceTabla = response;
    });
  }

  ///EVENTOS
  processClickRow(row: string) {
    console.log('Click en : ', row);
    row['class'] = 'text-primary';
  }

  processEditRow(row: any) {
    console.log('Edit en : ', row.id);
    //this.modalService.openModal();
    //this.router.navigate(['detalleusuario', row.id]);
  }

  processDeleteRow(row: any) {
    console.log('Delete en : ', row.id);
  }

  processButton(button: any) {
    console.log('Proceso: ', button.action);
  }

  processTreeSelect(event: any): void {
    let selectedItem = this.tree.getSelectedItem();
    if (selectedItem != null) {
      let json: NodoZona[] = this.data;
      let zona = this.processRecursive(json, selectedItem.element.id);
      this.dataSourceTabla = zona.sons;

      this.actualizaGrid();
    }
  }

  processRecursive(json: NodoZona[], id: number) {
    let zona = json.find((zon: NodoZona) => {
      return zon.id == id;
    });

    if (isUndefined(zona)) {
      for (var i = 0; i < json.length; i++) {
        zona = this.processRecursive(json[i].sons, id);
        if (!isUndefined(zona)) {
          return zona;
        }
      }
    }
    return zona;
  }

  processTreeExpand(event: any): void {
    let args = event.args;
    let item = this.tree.getItem(args.element);
  }

  processTreeCollapse(event: any): void {
    let args = event.args;
    let item = this.tree.getItem(args.element);
  }

  processContextMenu(event: any): void {
    let args = event.args;
    let item = args.innerText;
    let selectedItem = this.tree.getSelectedItem();

    switch (item) {
      case this.submenu[0].label:
        if (selectedItem != null) {
          console.log('Add' + ' --->' + selectedItem.element.id);
          console.log('' + this.submenu[0].name);
        }
        break;
      case this.submenu[1].label:
        if (selectedItem != null) {
          console.log('' + this.submenu[1].name);
          //', selectedItem.element.id
          this.router.navigate(['perfiles']);
        }
        break;
      case this.submenu[2].label:
        if (selectedItem != null) {
          // console.log('Add' + ' --->' + selectedItem.element.id);
          console.log('' + this.submenu[2].name);
          this.router.navigate(['alertas']);
        }
        break;
      case this.submenu[3].label:
        if (selectedItem != null) {
          console.log('Add' + ' --->' + selectedItem.element.id);
          console.log('' + this.submenu[3].name);
        }
        break;
    }
  }

  contextmenuMenu(event: any) {
    if ((<HTMLInputElement>event.target).classList.contains('jqx-tree-item')) {
      this.tree.selectItem(event.target);
      let scrollTop = window.scrollY;
      let scrollLeft = window.scrollX;

      this.menu.open(event.clientX + 5 + scrollLeft, event.clientY + 5 + scrollTop);
      return false;
    } else {
      this.menu.close();
    }
  }

  cellClick(event: any): void {}

  actualizaGrid() {
    this.sourceTabla.localdata = this.dataSourceTabla;
    console.log(this.sourceTabla);
    this.Grid.updatebounddata('cells');
  }
}
