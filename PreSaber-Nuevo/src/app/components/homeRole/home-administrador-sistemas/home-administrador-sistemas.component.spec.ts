import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeAdministradorSistemasComponent } from './home-administrador-sistemas.component';

describe('HomeAdministradorSistemasComponent', () => {
  let component: HomeAdministradorSistemasComponent;
  let fixture: ComponentFixture<HomeAdministradorSistemasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HomeAdministradorSistemasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeAdministradorSistemasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
