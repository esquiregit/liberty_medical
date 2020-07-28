import React from 'react';
import CircularProgress from '@material-ui/core/CircularProgress';
import { BrowserRouter } from 'react-router-dom';
import { Route, Switch } from 'react-router-dom';

const Login              = React.lazy(() => import('./Components/External/Login'));
const Report             = React.lazy(() => import('./Components/Internal/Report'));
const Profile            = React.lazy(() => import('./Components/Internal/Profile'));
const Error404           = React.lazy(() => import('./Components/Extras/FourZeroFour'));
const Recovery           = React.lazy(() => import('./Components/External/Recovery'));
const Dashboard          = React.lazy(() => import('./Components/Internal/Dashboard/Dashboard'));
const AuditTrail         = React.lazy(() => import('./Components/Internal/AuditTrail'));
const ManageRoles        = React.lazy(() => import('./Components/Internal/Roles/ManageRoles'));
const ManageStaff        = React.lazy(() => import('./Components/Internal/Staff/ManageStaff'));
const LabSelection       = React.lazy(() => import('./Components/Internal/LabSelection/LabSelection'));
const ManageCharges      = React.lazy(() => import('./Components/Internal/Charge/ManageCharges'));
const ManagePatients     = React.lazy(() => import('./Components/Internal/Patient/ManagePatients'));
const ManageRequests     = React.lazy(() => import('./Components/Internal/Request/ManageRequests'));
const PasswordChange     = React.lazy(() => import('./Components/External/PasswordChange'));
const ManageHistories    = React.lazy(() => import('./Components/Internal/History/ManageHistories'));
const UnauthorizedAccess = React.lazy(() => import('./Components/Internal/UnauthorizedAccess'));

// Bacteriology Histories
const ListAsciticFluidCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListAsciticFluidCS'));
const ListAspirateCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListAspirateCS'));
const ListBloodCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListBloodCS'));
const ListEarSwabCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListEarSwabCS'));
const ListEndocervicalSwab = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListEndocervicalSwab'));
const ListEyeSwabCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListEyeSwabCS'));
const ListHVSCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListHVSCS'));
const ListHVSRE = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListHVSRE'));
const ListPleuralFluid = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListPleuralFluid'));
const ListPusFluid = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListPusFluid'));
const ListSemenCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListSemenCS'));
const ListSkinSnip = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListSkinSnip'));
const ListSputumAFB = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListSputumAFB'));
const ListSputumCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListSputumCS'));
const ListStoolCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListStoolCS'));
const ListStoolRE = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListStoolRE'));
const ListThroatSwabCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListThroatSwabCS'));
const ListUrethralCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListUrethralCS'));
const ListUrineCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListUrineCS'));
const ListUrineRE = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListUrineRE'));
const ListWoundCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/List/ListWoundCS'));

// Chemistry Histories
const ListBloodSugar = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListBloodSugar'));
const ListBueCreatinine = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListBueCreatinine'));
const ListBueCreatinineEgfr = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListBueCreatinineEgfr'));
const ListBueLFT = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListBueLFT'));
const ListBueLipids = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListBueLipids'));
const ListCalciumProfile = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListCalciumProfile'));
const ListCardiacEnzyme = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListCardiacEnzyme'));
const ListCompactChemistry = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListCompactChemistry'));
const ListCReactiveProtein = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListCReactiveProtein'));
const ListCSFBiochem = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListCSFBiochem'));
const ListFolateB12 = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListFolateB12'));
const ListGeneralChemistry = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListGeneralChemistry'));
const ListHBA1C = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListHBA1C'));
const ListHypersensitiveCPR = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListHypersensitiveCPR'));
const ListIronStudy = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListIronStudy'));
const ListISE = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListISE'));
const ListLFT = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListLFT'));
const ListLipidProfile = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListLipidProfile'));
const ListProteinElectrophoresis = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListProteinElectrophoresis'));
const ListSC3SC4 = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListSC3SC4'));
const ListSerumLipase = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListSerumLipase'));
const ListUrine = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListUrine'));
const ListUrineACR = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/List/ListUrineACR'));

// Haematology Histories
const ListBloodFilmComment = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListBloodFIlmComment'));
const ListClottingProfile = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListClottingProfile'));
const ListDDimers = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListDDimers'));
const ListESR = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListESR'));
const ListFBC3P = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListFBC3P'));
const ListFBC5P = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListFBC5P'));
const ListFBCChildren = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListFBCChildren'));
const ListNTCScreening = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListNTCScreening'));
const ListSpecials = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/List/ListSpecials'));

// Hormonal Histories
const ListAlphaFetoProtein = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListAlphaFetoProtein'));
const ListCortisol = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListCortisol'));
const ListEstrogen = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListEstrogen'));
const ListHormonalAssay = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListHormonalAssay'));
const ListPSA = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListPSA'));
const ListPTH = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListPTH'));
const ListReproductiveAssay = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListReproductiveAssay'));
const ListTFT = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListTFT'));
const ListTroponin = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/List/ListTroponin'));

// Immunology Histories
const ListAntenatalScreening = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListAntenatalScreening'));
const ListCD4Count = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListCD4Count'));
const ListGeneralSerology = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListGeneralSerology'));
const ListHBVViralLoad = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListHBVViralLoad'));
const ListHIVViralLoad = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListHIVViralLoad'));
const ListHPyloriAg = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListHPyloriAg'));
const ListHPyloriAgBlood = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListHPyloriAgBlood'));
const ListHPyloriAgSOB = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListHPyloriAgSOB'));
const ListMantoux = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListMantoux'));
const ListPregnancyTest = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListPregnancyTest'));
const ListRheumatology = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListRheumatology'));
const ListSemenAnalysis = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListSemenAnalysis'));
const ListWidal = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListWidal'));
const ListHepatitisBProfile = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListHepatitisBProfile'));
const ListHepatitisMarkers = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/List/ListHepatitisMarkers'));

// TumourMarkers Histories
const ListCA125 = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/List/ListCA125'));
const ListCA153 = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/List/ListCA153'));
const ListCEA = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/List/ListCEA'));
const ListCKMB = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/List/ListCKMB'));
const ListCRP = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/List/ListCRP'));
const ListCRPUltraSensitive = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/List/ListCRPUltraSensitive'));
const ListMAlb = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/List/ListMAlb'));
const ListSerumHCG = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/List/ListSerumHCG'));

function App() {
    return (
        <React.Suspense fallback={<div className="loading-div"><CircularProgress color="primary" /></div>}>
            <BrowserRouter basename={'/'}>
                <Switch>
                    <Route path='/'                           component={ Login }              exact />
                    <Route path='/roles/'                     component={ ManageRoles }        exact />
                    <Route path='/staff/'                     component={ ManageStaff }        exact />
                    <Route path='/report/'                    component={ Report }             exact />
                    <Route path='/charges/'                   component={ ManageCharges }      exact />
                    <Route path='/history/'                   component={ ManageHistories }    exact />
                    <Route path='/profile/'                   component={ Profile }            exact />
                    <Route path='/patients/'                  component={ ManagePatients }     exact />
                    <Route path='/requests/'                  component={ ManageRequests }     exact />
                    <Route path='/dashboard/'                 component={ Dashboard }          exact />
                    <Route path='/activity-log/'              component={ AuditTrail }         exact />
                    <Route path='/password-recovery/'         component={ Recovery }           exact />
                    <Route path='/unauthorized-access/'       component={ UnauthorizedAccess } exact />
                    <Route path='/lab-selection/:patient_id'  component={ LabSelection }       exact />
                    <Route path='/password-change/:id/:code/' component={ PasswordChange }     exact />

                    <Route path='/history/ascitic-fluid' component={ ListAsciticFluidCS }     exact />
                    <Route path='/history/aspirate-cs' component={ ListAspirateCS }     exact />
                    <Route path='/history/blood-cs' component={ ListBloodCS }     exact />
                    <Route path='/history/ear-swab-cs' component={ ListEarSwabCS }     exact />
                    <Route path='/history/endocervical-swab' component={ ListEndocervicalSwab }     exact />
                    <Route path='/history/eye-swab-cs' component={ ListEyeSwabCS }     exact />
                    <Route path='/history/hvs-cs' component={ ListHVSCS }     exact />
                    <Route path='/history/hvs-re' component={ ListHVSRE }     exact />
                    <Route path='/history/pleural-fluid' component={ ListPleuralFluid }     exact />
                    <Route path='/history/pus-fluid' component={ ListPusFluid }     exact />
                    <Route path='/history/semen-cs' component={ ListSemenCS }     exact />
                    <Route path='/history/skin-snip' component={ ListSkinSnip }     exact />
                    <Route path='/history/sputum-afb' component={ ListSputumAFB }     exact />
                    <Route path='/history/sputum-cs' component={ ListSputumCS }     exact />
                    <Route path='/history/stool-cs' component={ ListStoolCS }     exact />
                    <Route path='/history/stool-re' component={ ListStoolRE }     exact />
                    <Route path='/history/throat-swab' component={ ListThroatSwabCS }     exact />
                    <Route path='/history/urethral-cs' component={ ListUrethralCS }     exact />
                    <Route path='/history/urine-cs' component={ ListUrineCS }     exact />
                    <Route path='/history/urine-re' component={ ListUrineRE }     exact />
                    <Route path='/history/wound-cs' component={ ListWoundCS }     exact />
                    <Route path='/history/blood-sugar' component={ ListBloodSugar }     exact />
                    <Route path='/history/bue-creatinine' component={ ListBueCreatinine }     exact />
                    <Route path='/history/bue-creatinine-egfr' component={ ListBueCreatinineEgfr }     exact />
                    <Route path='/history/bue-lft' component={ ListBueLFT }     exact />
                    <Route path='/history/bue-lipids' component={ ListBueLipids }     exact />
                    <Route path='/history/calcium-profile' component={ ListCalciumProfile }     exact />
                    <Route path='/history/cardiac-enzyme' component={ ListCardiacEnzyme }     exact />
                    <Route path='/history/compact-chemistry' component={ ListCompactChemistry }     exact />
                    <Route path='/history/c-reactive-protein' component={ ListCReactiveProtein }     exact />
                    <Route path='/history/csf-biochem' component={ ListCSFBiochem }     exact />
                    <Route path='/history/folate-b12' component={ ListFolateB12 }     exact />
                    <Route path='/history/general-chemistry' component={ ListGeneralChemistry }     exact />
                    <Route path='/history/hba1c' component={ ListHBA1C }     exact />
                    <Route path='/history/hypersensitive-cpr' component={ ListHypersensitiveCPR }     exact />
                    <Route path='/history/iron-study' component={ ListIronStudy }     exact />
                    <Route path='/history/ise' component={ ListISE }     exact />
                    <Route path='/history/lft' component={ ListLFT }     exact />
                    <Route path='/history/lipid-profile' component={ ListLipidProfile }     exact />
                    <Route path='/history/protein-electrophoresis' component={ ListProteinElectrophoresis }     exact />
                    <Route path='/history/sc3-sc4' component={ ListSC3SC4 }     exact />
                    <Route path='/history/serum-lipase' component={ ListSerumLipase }     exact />
                    <Route path='/history/urine' component={ ListUrine }     exact />
                    <Route path='/history/urine-acr' component={ ListUrineACR }     exact />
                    <Route path='/history/blood-film-comment' component={ ListBloodFilmComment }     exact />
                    <Route path='/history/clotting-profile' component={ ListClottingProfile }     exact />
                    <Route path='/history/d-dimers' component={ ListDDimers }     exact />
                    <Route path='/history/esr' component={ ListESR }     exact />
                    <Route path='/history/fbc-3p' component={ ListFBC3P }     exact />
                    <Route path='/history/fbc-5p' component={ ListFBC5P }     exact />
                    <Route path='/history/fbc-children' component={ ListFBCChildren }     exact />
                    <Route path='/history/ntc-screening' component={ ListNTCScreening }     exact />
                    <Route path='/history/specials' component={ ListSpecials }     exact />
                    <Route path='/history/alpha-feto-protein' component={ ListAlphaFetoProtein }     exact />
                    <Route path='/history/cortisol' component={ ListCortisol }     exact />
                    <Route path='/history/estrogen' component={ ListEstrogen }     exact />
                    <Route path='/history/hormonal-assay' component={ ListHormonalAssay }     exact />
                    <Route path='/history/psa' component={ ListPSA }     exact />
                    <Route path='/history/pth' component={ ListPTH }     exact />
                    <Route path='/history/reproductive-assay' component={ ListReproductiveAssay }     exact />
                    <Route path='/history/tft' component={ ListTFT }     exact />
                    <Route path='/history/troponin' component={ ListTroponin }     exact />
                    <Route path='/history/antenatal-screening' component={ ListAntenatalScreening }     exact />
                    <Route path='/history/cd4-count' component={ ListCD4Count }     exact />
                    <Route path='/history/general-serology' component={ ListGeneralSerology }     exact />
                    <Route path='/history/hbv-viral-load' component={ ListHBVViralLoad }     exact />
                    <Route path='/history/hiv-viral-load' component={ ListHIVViralLoad }     exact />
                    <Route path='/history/h-pylori-ag' component={ ListHPyloriAg }     exact />
                    <Route path='/history/h-pylori-ag-blood' component={ ListHPyloriAgBlood }     exact />
                    <Route path='/history/h-pylori-ag-sob' component={ ListHPyloriAgSOB }     exact />
                    <Route path='/history/mantoux' component={ ListMantoux }     exact />
                    <Route path='/history/pregnancy-test' component={ ListPregnancyTest }     exact />
                    <Route path='/history/rheumatology' component={ ListRheumatology }     exact />
                    <Route path='/history/semen-analysis' component={ ListSemenAnalysis }     exact />
                    <Route path='/history/widal' component={ ListWidal }     exact />
                    <Route path='/history/hepatitis-b-profile' component={ ListHepatitisBProfile }     exact />
                    <Route path='/history/hepatitis-markers' component={ ListHepatitisMarkers }     exact />
                    <Route path='/history/ca-125' component={ ListCA125 }     exact />
                    <Route path='/history/ca-153' component={ ListCA153 }     exact />
                    <Route path='/history/cea' component={ ListCEA }     exact />
                    <Route path='/history/ckmb' component={ ListCKMB }     exact />
                    <Route path='/history/crp' component={ ListCRP }     exact />
                    <Route path='/history/crp-ultrasensitive' component={ ListCRPUltraSensitive }     exact />
                    <Route path='/history/m-alb' component={ ListMAlb }     exact />
                    <Route path='/history/b-hcg-serum' component={ ListSerumHCG }     exact />

                    <Route path='*' component={ Error404 } />
                </Switch>
            </BrowserRouter>
        </React.Suspense>
    );
}

export default App;
