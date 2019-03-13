import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http'

// Component
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { ProfileComponent } from './components/profile/profile.component';
import { SignupComponent } from './components/signup/signup.component';

// Firebase
import { AngularFireModule } from 'angularfire2';
import { AngularFireAuthModule } from 'angularfire2/auth';
import { AngularFireDatabase, AngularFireObject } from 'angularfire2/database';
import { AngularFirestoreModule } from 'angularfire2/firestore';

// Routes
export const router: Routes = [
  { path: '', component: HomeComponent },
  { path: 'login', component: LoginComponent },
  { path: 'signup', component: SignupComponent },
  { path: 'profile', component: ProfileComponent }
]

// Config Firebase
export const firebaseConfig = {
  apiKey: "AIzaSyCqIOhyAV7e3KbxEnBUXHW-H_M6s40Hwv0",
    authDomain: "my-project-1511168933235.firebaseapp.com",
    databaseURL: "https://my-project-1511168933235.firebaseio.com",
    projectId: "my-project-1511168933235",
    storageBucket: "my-project-1511168933235.appspot.com",
    messagingSenderId: "575336555180"
 };

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    LoginComponent,
    NavbarComponent,
    ProfileComponent,
    SignupComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    RouterModule.forRoot(router),
    AngularFireAuthModule,
    AngularFireModule.initializeApp(firebaseConfig),
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
