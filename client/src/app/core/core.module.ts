import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthComponent } from './components/auth/auth.component';
import { RouterModule, Routes } from '@angular/router';
import { AppModule } from '../app.module';



@NgModule({
  declarations: [
    AuthComponent
  ],
  imports: [
    CommonModule,
    RouterModule,

  ],
  exports: [
    AuthComponent
  ]
})
export class CoreModule { }
