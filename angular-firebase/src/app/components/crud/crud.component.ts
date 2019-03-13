import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import {AngularFireDatabase} from 'angularfire2/database';
@Component({
  selector: 'app-crud',
  templateUrl: './crud.component.html',
  styleUrls: ['./crud.component.css']
})
export class CRUDComponent implements OnInit {

  constructor(private db: AngularFireDatabase) { }

  ngOnInit() {
  }

  addWiki(data : NgForm){
    this.db.list("/datas").push(data.value);
  }

}
