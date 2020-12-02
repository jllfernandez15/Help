import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListadoPaginadoComponent } from './listado-paginado.component';

describe('ListadoPaginadoComponent', () => {
  let component: ListadoPaginadoComponent;
  let fixture: ComponentFixture<ListadoPaginadoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListadoPaginadoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListadoPaginadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
