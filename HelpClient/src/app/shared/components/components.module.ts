import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { DatatableComponent } from './datatable/datatable.component';
import { TreeComponent } from './tree/tree.component';
import { ToolbarComponent } from './toolbar/toolbar.component';
import { ButtonsboxComponent } from './buttonsbox/buttonsbox.component';
import { PaginadorComponent } from './paginador/paginador.component';


@NgModule({
  declarations: [DatatableComponent, TreeComponent, ToolbarComponent, ButtonsboxComponent, PaginadorComponent ],
  imports: [
    CommonModule, RouterModule
  ],
  exports: [DatatableComponent, TreeComponent, ToolbarComponent, ButtonsboxComponent]
})
export class ComponentsModule { }
