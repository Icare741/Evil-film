import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PageAccueilComponent } from './pages/page-accueil/page-accueil.component';



const routes: Routes = [
  { path: '', component: PageAccueilComponent },
  
];


@NgModule({
  declarations: [],
  imports: [RouterModule.forRoot(routes, {
    scrollPositionRestoration: 'top', // Cela ramènera toujours le scroll en haut de la page lors de la navigation
  })],
  exports: [RouterModule],
})

export class AppRoutingModule { }
