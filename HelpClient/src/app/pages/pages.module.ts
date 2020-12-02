import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';
import { LoginComponent } from './login/login.component';
import { FormsModule }   from '@angular/forms';

import { Routes, RouterModule, PreloadAllModules } from '@angular/router';

import { SharedModule } from '../shared/shared.module';
import { VehiculosModule } from './vehiculos/vehiculos.module';

import { WellcomeComponent } from './wellcome/wellcome.component';
import { VehiculosComponent } from './vehiculos/vehiculos/vehiculos.component';

const rutas: Routes = [
  { path: 'wellcome', component:WellcomeComponent },
  { path: 'vehiculos', component:VehiculosComponent },
];

@NgModule({
  declarations: [LoginComponent, WellcomeComponent],
  imports: [
    RouterModule.forRoot(rutas, { preloadingStrategy: PreloadAllModules }),
    CommonModule, FormsModule, HttpClientModule,
    SharedModule, VehiculosModule
  ],
  exports: [
    LoginComponent,
    RouterModule],
    providers: []
})
export class PagesModule { }
