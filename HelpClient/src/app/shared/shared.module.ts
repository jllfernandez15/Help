import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ShellModule } from './shell/shell.module';
import { ComponentsModule } from './components/components.module';

import { DatatableComponent } from './components/datatable/datatable.component';
import { TreeComponent } from './components/tree/tree.component';
import { ToolbarComponent } from './components/toolbar/toolbar.component';
import { ButtonsboxComponent } from './components/buttonsbox/buttonsbox.component';

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    ShellModule,
    ComponentsModule
  ],
  exports: [DatatableComponent, TreeComponent, ToolbarComponent, ButtonsboxComponent]
})
export class SharedModule { }
