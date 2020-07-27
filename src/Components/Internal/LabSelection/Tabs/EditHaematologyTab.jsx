import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import EditBloodFilmComment from '../Labs/Haematology/EditBloodFilmComment';
import EditClottingProfile from '../Labs/Haematology/EditClottingProfile';
import EditDDimers from '../Labs/Haematology/EditDDimers';
import EditESR from '../Labs/Haematology/EditESR';
import EditFBC3P from '../Labs/Haematology/EditFBC3P';
import EditFBC5P from '../Labs/Haematology/EditFBC5P';
import EditFBCChildren from '../Labs/Haematology/EditFBChildren';
import EditNTCScreening from '../Labs/Haematology/EditNTCScreening';
import EditSpecials from '../Labs/Haematology/EditSpecials';

const HaematologyTab = ({ lab }) => {
    const [esr, setESR]                           = useState(false);
    const [fBC3P, setFBC3P]                       = useState(false);
    const [fBC5P, setFBC5P]                       = useState(false);
    const [dDimers, setDDimers]                   = useState(false);
    const [specials, setSpecials]                 = useState(false);
    const [fBChildren, setFBCChildren]            = useState(false);
    const [nTCScreening, setNTCScreening]         = useState(false);
    const [clottingProfile, setClottingProfile]   = useState(false);
    const [bloodFilmComment, setBloodFilmComment] = useState(false);

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
            { esr              && <EditESR              lab={lab} closeModal={closeModal} /> }
            { fBC3P            && <EditFBC3P            lab={lab} closeModal={closeModal} /> }
            { fBC5P            && <EditFBC5P            lab={lab} closeModal={closeModal} /> }
            { dDimers          && <EditDDimers          lab={lab} closeModal={closeModal} /> }
            { specials         && <EditSpecials         lab={lab} closeModal={closeModal} /> }
            { fBChildren       && <EditFBCChildren      lab={lab} closeModal={closeModal} /> }
            { nTCScreening     && <EditNTCScreening     lab={lab} closeModal={closeModal} /> }
            { clottingProfile  && <EditClottingProfile  lab={lab} closeModal={closeModal} /> }
            { bloodFilmComment && <EditBloodFilmComment lab={lab} closeModal={closeModal} /> }
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
