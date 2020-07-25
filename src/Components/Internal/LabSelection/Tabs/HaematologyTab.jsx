import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import AddBloodFilmComment from '../Labs/Haematology/AddBloodFilmComment';
import AddClottingProfile from '../Labs/Haematology/AddClottingProfile';
import AddDDimers from '../Labs/Haematology/AddDDimers';
import AddESR from '../Labs/Haematology/AddESR';
import AddFBC3P from '../Labs/Haematology/AddFBC3P';
import AddFBC5P from '../Labs/Haematology/AddFBC5P';
import AddFBCChildren from '../Labs/Haematology/AddFBCChildren';
import AddNTCScreening from '../Labs/Haematology/AddNTCScreening';
import AddSpecials from '../Labs/Haematology/AddSpecials';

const HaematologyTab = ({ patient }) => {
    const [bloodFilmComment, setBloodFilmComment] = useState(false);
    const [clottingProfile, setClottingProfile] = useState(false);
    const [dDimers, setDDimers] = useState(false);
    const [esr, setESR] = useState(false);
    const [fBC3P, setFBC3P] = useState(false);
    const [fBC5P, setFBC5P] = useState(false);
    const [fBChildren, setFBCChildren]         = useState(false);
    const [nTCScreening, setNTCScreening]   = useState(false);
    const [specials, setSpecials] = useState(false);

    const closeModal = modal => {
        if(modal.toLowerCase() === 'bloodfilmcomment') {
            setBloodFilmComment(false);
        } else if(modal.toLowerCase() === 'clottingprofile') {
            setClottingProfile(false);
        } else if(modal.toLowerCase() === 'ddimers') {
            setDDimers(false);
        } else if(modal.toLowerCase() === 'esr') {
            setESR(false);
        } else if(modal.toLowerCase() === 'fbc3p') {
            setFBC3P(false);
        } else if(modal.toLowerCase() === 'fbc5p') {
            setFBC5P(false);
        } else if(modal.toLowerCase() === 'fbcchildren') {
            setFBCChildren(false);
        } else if(modal.toLowerCase() === 'ntcscreening') {
            setNTCScreening(false);
        } else if(modal.toLowerCase() === 'specials') {
            setSpecials(false);
        }
    };

    return (
        <>
            { bloodFilmComment && <AddBloodFilmComment patient={patient} closeModal={closeModal} /> }
            { clottingProfile && <AddClottingProfile patient={patient} closeModal={closeModal} /> }
            { dDimers && <AddDDimers patient={patient} closeModal={closeModal} /> }
            { esr && <AddESR patient={patient} closeModal={closeModal} /> }
            { fBC3P && <AddFBC3P patient={patient} closeModal={closeModal} /> }
            { fBC5P && <AddFBC5P patient={patient} closeModal={closeModal} /> }
            { fBChildren     && <AddFBCChildren     patient={patient} closeModal={closeModal} /> }
            { nTCScreening  && <AddNTCScreening  patient={patient} closeModal={closeModal} /> }
            { specials && <AddSpecials patient={patient} closeModal={closeModal} /> }
            <table>
                <tbody>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setBloodFilmComment(true)}
                                variant="outlined">
                                blood film comment
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setClottingProfile(true)}
                                variant="outlined">
                                clotting profile
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setDDimers(true)}
                                variant="outlined">
                                d - dimers
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setESR(true)}
                                variant="outlined">
                                ESR
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setFBC3P(true)}
                                variant="outlined">
                                FBC 3P
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setFBC5P(true)}
                                variant="outlined">
                                FBC 5P
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setFBCChildren(true)}
                                variant="outlined">
                                FBC children
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setNTCScreening(true)}
                                variant="outlined">
                                NTC screening
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td colSpan="2">
                            <Button
                                fullWidth
                                onClick={() => setSpecials(true)}
                                variant="outlined">
                                specials
                            </Button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </>
    )
}

export default HaematologyTab;
