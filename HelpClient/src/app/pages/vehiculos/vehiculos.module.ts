import { NgModule } from '@angular/core';
import { Routes, RouterModule, PreloadAllModules } from '@angular/router';
import { FormsModule }   from '@angular/forms';

import { CommonModule } from '@angular/common';
import { VehiculosComponent } from './vehiculos/vehiculos.component';

import { SharedModule } from '../../shared/shared.module';
import { ListadoPaginadoComponent } from './listado-paginado/listado-paginado.component';
import { FormularioComponent } from './formulario/formulario.component';

const rutas: Routes = [
  { path: 'vehiculos', component:VehiculosComponent },
  { path: 'vehiculos/paged/:page', component: ListadoPaginadoComponent },
  
];

@NgModule({
  declarations: [VehiculosComponent, ListadoPaginadoComponent, FormularioComponent],
  imports: [
    RouterModule.forRoot(rutas, { preloadingStrategy: PreloadAllModules }),
    CommonModule, FormsModule, SharedModule
  ],
  exports: [
    //LoginComponent,
    RouterModule],
    providers: []
})
export class VehiculosModule { }
