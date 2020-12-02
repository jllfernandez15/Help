import { NgModule } from '@angular/core';
import { Routes, RouterModule, PreloadAllModules } from '@angular/router';

import { PagesModule} from './pages/pages.module';
import { LoginComponent } from './pages/login/login.component';


const rutas: Routes = [
   { path: '', redirectTo: 'login', pathMatch: 'full'},
   { path: 'login', component:LoginComponent },
     
 ];

@NgModule({declarations: [
  ],
  imports: [PagesModule, RouterModule.forRoot(rutas, { preloadingStrategy: PreloadAllModules })],
  exports: [RouterModule],
  providers: []
})

export class AppRoutingModule {}
