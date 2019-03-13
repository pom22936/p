import { Component, OnInit } from '@angular/core';
import { AngularFireDatabase, AngularFireList } from 'angularfire2/database';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  dataList: AngularFireList<any>;
  datas: any[];

  constructor(db: AngularFireDatabase) {
    this.dataList = db.list('datas');
   }

  ngOnInit() {
    this.dataList.snapshotChanges().map(action => {
      return action.map(action => ({key : action.key , value : action.payload.val()}));
    }).subscribe(items => {
      this.datas = items;
    });
  }

}
