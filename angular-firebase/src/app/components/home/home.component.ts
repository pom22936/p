import { Component, OnInit } from '@angular/core';
import { AngularFireDatabase, AngularFireList } from 'angularfire2/database';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  dataList: any;
  datas: any[];


  constructor(private db: AngularFireDatabase,private router: Router) {

   }

  ngOnInit() {
    this.dataList = this.db.list('datas');
    this.dataList.snapshotChanges().subscribe(items => {
      this.datas = items.map(items => ({key : items.key ,value : items.payload.val()}));
    });
  }

  delWiki(data) {
    this.dataList.remove(data.key);
  }

  editWiki(data) {
    this.router.navigate([`/editWiki/${data.key}`]);
  }

}
