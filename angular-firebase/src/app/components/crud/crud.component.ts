import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import {AngularFireDatabase} from 'angularfire2/database';
import {ActivatedRoute} from '@angular/router';
import { Router } from '@angular/router';
@Component({
  selector: 'app-crud',
  templateUrl: './crud.component.html',
  styleUrls: ['./crud.component.css']
})
export class CRUDComponent implements OnInit {

  data: any= {};
  title: string = "Add data";
  id:any;
  constructor(private db: AngularFireDatabase,private route: ActivatedRoute,private router : Router) { }

  ngOnInit() {
    this.id = this.route.snapshot.paramMap.get("id");
    if(this.id){
        this.title = "Edit Data";
        this.getWikiByKey(this.id);
    }
  }

  addWiki(data : NgForm){
    if(this.id){
      this.db.list("/datas").update(this.id,data.value);
      this.router.navigate(["/"]);
    }else{
      this.db.list("/datas").push(data.value);
      this.router.navigate(["/"]);
    }

  }

  getWikiByKey(id){
    this.data = this.db.object('datas/' + id).snapshotChanges().subscribe(res => {
      console.log(res.payload.val());
       return this.data = res.payload.val();
    });
    }

}
