import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PageAccueilComponent } from './page-accueil/page-accueil.component';
import { RouterModule, Routes } from '@angular/router';
import { AppModule } from '../app.module';
import { CoreModule } from '../core/core.module';



@NgModule({
  declarations: [
    PageAccueilComponent
  ],
  imports: [
    CommonModule,
    RouterModule,
    CoreModule,
  ]
})
export class PagesModule { }
