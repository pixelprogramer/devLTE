import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PreLoaderPixelComponent } from './pre-loader-pixel.component';

describe('PreLoaderPixelComponent', () => {
  let component: PreLoaderPixelComponent;
  let fixture: ComponentFixture<PreLoaderPixelComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PreLoaderPixelComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PreLoaderPixelComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
