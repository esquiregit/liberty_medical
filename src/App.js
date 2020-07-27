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

// lab histories
const ListAsciticFluidCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListAsciticFluidCS'));
const ListAspirateCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListAspirateCS'));
const ListBloodCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListBloodCS'));
const ListEarSwabCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListEarSwabCS'));
const ListEndocervicalSwab = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListEndocervicalSwab'));
const ListEyeSwabCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListEyeSwabCS'));
const ListHVSCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListHVSCS'));
const ListHVSRE = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListHVSRE'));
const ListPleuralFluid = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListPleuralFluid'));
const ListPusFluid = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListPusFluid'));
const ListSemenCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListSemenCS'));
const ListSkinSnip = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListSkinSnip'));
const ListSputumAFB = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListSputumAFB'));
const ListSputumCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListSputumCS'));
const ListStoolCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListStoolCS'));
const ListStoolRE = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListStoolRE'));
const ListThroatSwabCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListThroatSwabCS'));
const ListUrethralCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListUrethralCS'));
const ListUrineCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListUrineCS'));
const ListUrineRE = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListUrineRE'));
const ListWoundCS = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Bacteriology/ListWoundCS'));

const ListBloodSugar = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListBloodSugar'));
const ListBueCreatinine = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListBueCreatinine'));
const ListBueCreatinineEgfr = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListBueCreatinineEgfr'));
const ListBueLFT = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListBueLFT'));
const ListBueLipids = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListBueLipids'));
const ListCalciumProfile = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListCalciumProfile'));
const ListCardiacEnzyme = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListCardiacEnzyme'));
const ListCompactChemistry = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListCompactChemistry'));
const ListCReactiveProtein = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListCReactiveProtein'));
const ListCSFBiochem = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListCSFBiochem'));
const ListFolateB12 = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListFolateB12'));
const ListGeneralChemistry = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListGeneralChemistry'));
const ListHBA1C = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListHBA1C'));
const ListHypersensitiveCPR = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListHypersensitiveCPR'));
const ListIronStudy = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListIronStudy'));
const ListISE = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListISE'));
const ListLFT = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListLFT'));
const ListLipidProfile = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListLipidProfile'));
const ListProteinElectrophoresis = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListProteinElectrophoresis'));
const ListSC3SC4 = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListSC3SC4'));
const ListSerumLipase = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListSerumLipase'));
const ListUrine = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListUrine'));
const ListUrineACR = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Chemistry/ListUrineACR'));

const ListBloodFIlmComment = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListBloodFIlmComment'));
const ListClottingProfile = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListClottingProfile'));
const ListDDimers = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListDDimers'));
const ListESR = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListESR'));
const ListFBC3P = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListFBC3P'));
const ListFBC5P = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListFBC5P'));
const ListFBCChildren = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListFBCChildren'));
const ListNTCScreening = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListNTCScreening'));
const ListSpecials = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Haematology/ListSpecials'));

const ListAlphaFetoProtein = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListAlphaFetoProtein'));
const ListCortisol = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListCortisol'));
const ListEstrogen = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListEstrogen'));
const ListHormonalAssay = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListHormonalAssay'));
const ListPSA = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListPSA'));
const ListPTH = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListPTH'));
const ListReproductiveAssay = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListReproductiveAssay'));
const ListTFT = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListTFT'));
const ListTroponin = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Hormonal/ListTroponin'));

const ListAntenatalScreening = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListAntenatalScreening'));
const ListCD4Count = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListCD4Count'));
const ListGeneralSerology = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListGeneralSerology'));
const ListHBVViralLoad = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListHBVViralLoad'));
const ListHIVViralLoad = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListHIVViralLoad'));
const ListHPyloriAg = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListHPyloriAg'));
const ListHPyloriAgBlood = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListHPyloriAgBlood'));
const ListHPyloriAgSOB = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListHPyloriAgSOB'));
const ListMantoux = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListMantoux'));
const ListPregnancyTest = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListPregnancyTest'));
const ListRheumatology = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListRheumatology'));
const ListSemenAnalysis = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListSemenAnalysis'));
const ListWidal = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListWidal'));
const ListHepatitisBProfile = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListHepatitisBProfile'));
const ListHepatitisMarkers = React.lazy(() => import('./Components/Internal/LabSelection/Labs/Immunology/ListHepatitisMarkers'));

const ListCA125 = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/ListCA125'));
const ListCA153 = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/ListCA153'));
const ListCEA = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/ListCEA'));
const ListCKMB = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/ListCKMB'));
const ListCRP = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/ListCRP'));
const ListCRPUltraSensitive = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/ListCRPUltraSensitive'));
const ListMAlb = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/ListMAlb'));
const ListSerumHCG = React.lazy(() => import('./Components/Internal/LabSelection/Labs/TumourMarkers/ListSerumHCG'));

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
                    <Route path='*'                           component={ Error404 } />
                </Switch>
            </BrowserRouter>
        </React.Suspense>
    );
}

export default App;
