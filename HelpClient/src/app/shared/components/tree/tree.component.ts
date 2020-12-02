import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

import { Nodo } from 'src/app/core/models/common/Nodo';


@Component({
  selector: 'app-tree',
  templateUrl: './tree.component.html',
  styleUrls: ['./tree.component.scss']
})
export class TreeComponent implements OnInit {
  @Input() dataTree: Nodo[];
  @Input() tituloTree: string;

  @Output() clickedItem = new EventEmitter<string>();

  private nodo: Nodo;

  constructor() { }

  ngOnInit() {
    console.log("Arbol");
    console.log(this.dataTree);
    //this.tree.render;
  }

  ///EVENTOS
  onClick(item: any) {
    //console.log('Click en : ', item);
    this.click();
    //item['class'] = 'text-primary';
    this.nodo = item as Nodo;
    //console.log('Generico : '+ item.name);
    this.clickedItem.emit(item);
  }

  onSelect(item: any) {
    //console.log('Click en : ', item);    
  }

  onExpand(item: any) {
    //console.log('Click en : ', item);    
  }

  onCollapse(item: any) {
    //console.log('Click en : ', item);    
  }

  onContextmenu(item: any) {
    //console.log('Click en : ', item);    
  }

  // Methods
  click() {
    var toggler = document.getElementsByClassName('caret');
    var i;
    for (i = 0; i < toggler.length; i++) {
      toggler[i].addEventListener('click', function () {
        this.parentElement.querySelector('.nested').classList.toggle('active');
        this.classList.toggle('caret-down');
      });
    }
   // this.nodo = 
  }

  public getSelectedItem() : Nodo {
    return this.nodo;
  }

  renderTree(source: Nodo[]) {
    for (var i = 0, max = source.length; i < max; i += 1) {
      /* if (source[i].sons.length > 0) {
         source[i].sons = this.renderTree(source[i].sons);
       }
 */
      // source[i]['icon'] = this.mapeo(source[i].tipo);
      // source[i]['label'] = source[i]['descripcion'];
      // source[i]['items'] = source[i]['sons'];
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



}
/*
ngOnInit() {
    this.dataTreeTabla = [];
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
      this.dataTreeTabla = response;
    });
  }

  ///EVENTOS
  processClickRow(row: string) {
    console.log('Click en : ', row);
    row['class'] = 'text-primary';
  }
    cellClick(event: any): void {}


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
      this.dataTreeTabla = zona.sons;

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


  actualizaGrid() {
    this.sourceTabla.localdata = this.dataTreeTabla;
    console.log(this.sourceTabla);
    this.Grid.updatebounddata('cells');
  }

*/